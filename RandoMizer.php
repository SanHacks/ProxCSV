<?php
namespace Prox2;
class RandoMizer
{

    public function __construct()
    {
        $this->names = [];
        $this->surnames = [];
        $this->numberOfVariations = 0;
        $this->outputPath = "";
    }

    public function setNames($names)
    {
        $this->names = $names;
    }

    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    public function setNumberOfVariations($numberOfVariations)
    {
        $this->numberOfVariations = $numberOfVariations;
    }

    public function setOutputPath($outputPath)
    {
        $this->outputPath = $outputPath;
    }

    public function createCSV()
    {
        $file = fopen($this->outputPath, "w");
        $header = ["Name", "Surname", "ID Number", "Date of Birth"];
        fputcsv($file, $header);
        for ($i = 0; $i < $this->numberOfVariations; $i++) {
            $name = $this->names[rand(0, count($this->names) - 1)];
            $surname = $this->surnames[rand(0, count($this->surnames) - 1)];
            $idNumber = rand(1000000000000, 9999999999999);
            $dateOfBirth = rand(1950, 2018) . "-" . rand(1, 12) . "-" . rand(1, 28);
            $row = [$name, $surname, $idNumber, $dateOfBirth];
            fputcsv($file, $row);
        }
        fclose($file);
    }

    private $names;
    private $surnames;
    private $numberOfVariations;
    private $outputPath;

}