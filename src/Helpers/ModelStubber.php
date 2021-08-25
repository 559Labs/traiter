<?php

namespace FFNLabs\Traiter\Helpers;

class ModelStubber
{

    protected string $model;
    protected string $namespace;
    protected string $path;
    protected string $basepath;
    protected array $traits = ['Relations', 'Attributes', 'Scopes', 'Actions'];

    public function __construct(string $model)
    {
        $rc = new \ReflectionClass($model);
        $this->model = $rc->getShortName();
        $this->basepath = realpath(
            rtrim(
                rtrim($rc->getFileName(), $this->model . ".php"),
                "Models/"
            )
        );
        $this->path = $this->basepath . "/Concerns";
        $this->namespace = $rc->getNamespaceName();
        if (str_ends_with($this->namespace, "\\Models")) {
            $this->namespace = rtrim($this->namespace, "\\Models") . "\\Concerns";
        }
    }

    public function generate()
    {
        foreach ($this->traits as $trait) {
            $this->generateTraitFile($trait);
        }
        $this->generateModelFilePatch();
    }

    public function generateTraitAsString (string $trait) : string
    {
        $rv = "<?php\n\n" .
            "namespace " . $this->namespace . ";\n\n" .
            "trait " . $this->model . $trait . "Trait {\n\n}\n";
        print($rv);
        return $rv;
    }

    public function generateTraitFile(string $trait) {
        $filename = join("", [
            $this->path, "/", $this->model, $trait, "Trait.php",
        ]);
        if (!is_dir($this->path)) {
            mkdir($this->path, 0700, true);
        }
        file_put_contents(
            $filename,
            $this->generateTraitAsString($trait)
        );
    }

    public function generateModelFilePatchImportString() {
        $rv = "";
        foreach ($this->traits as $trait) {
            $rv .= "use " . $this->namespace . "\\"
                . $this->model . $trait . "Trait;\n";
        }
        return $rv;
    }

    public function generateModelFilePatchUsesString() {
        $rv = "";
        foreach ($this->traits as $trait) {
            $rv .= "use " . $this->model . $trait . "Trait;\n";
        }
        return $rv;
    }

    public function generateModelFilePatch() {
        $uses = $this->generateModelFilePatchUsesString();
        $import = $this->generateModelFilePatchImportString();
        print("Paste this into the imports of your model definition:\n");
        print("\n\n==========\n");
        print ($import);
        print("\n\n==========\n");
        print("Paste this into the uses statement of your model class:\n");
        print("\n\n==========\n");
        print ($uses);
        print("\n\n==========\n");

        // LOAD THE MODEL FILE
        // FIND THE NAMESPACE\N
        // INSERT IMPORT
        // FIND THE CLASS OPENING (FIRST '{' ?})
        // INSERT USES
        // SAVE FILE
    }


//     foreach ($traits as $t) {
//         $content = $stub . $m . $t . " {\n\n}";
//         $filename = $filename_base . $m . $t . ".php";
//         file_put_contents($filename, $content);
//     }

// foreach ($models as $m) {
//     foreach ($traits as $t) {
//         print("use App\\Concerns\\" . $m . $t . ";\n");
//     }
//     print("use " .
//         $m . "Attributes, " .
//         $m . "Relations, " .
//         $m . "Scopes, " .
//         $m . "Actions;\n\n");
// }


}

