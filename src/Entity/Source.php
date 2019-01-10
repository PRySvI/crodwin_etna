<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SourceRepository")
 */
class Source
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a CSV file.")
     * @Assert\File( mimeTypes = {"text/plain", "text/csv"})
     */

    private $file;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $strings = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $translated_strings = array();

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="sources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function readStringsFromFile()
    {

        $lines = explode( "\n", file_get_contents($_SERVER["DOCUMENT_ROOT"].'/uploads/files/'.$this->file));
        foreach ($lines as $line)
        {
            if(empty($line))
                continue;
            $line = str_replace(array("\r","\n"),"",$line);
            $newline = explode( ";", $line );
           // mb_convert_encoding($newline[0],'UTF-8', 'ISO-8859-1');
            $this->strings[mb_convert_encoding($newline[0],'UTF-8')] = mb_convert_encoding($newline[1],'UTF-8');
        }

    }

    public function getStrings(): ?array
    {
        return $this->strings;
    }

    public function setStrings(?array $strings): self
    {
        $this->strings = $strings;

        return $this;
    }

    public function getTranslatedStrings(): ?array
    {
        return $this->translated_strings;
    }

    public function getTranslatedStringsByLang($lang): ?array
    {
        $strings = array();

        foreach ($this->translated_strings as $key => $value)
        {
            foreach ($value as $key2 => $value2)
            {
                if($lang === $key2)
                {
                    $strings[$key][$key2] = $value2;
                }
            }
        }
        return $strings;
    }

    public function addTranslatedStrings($key, $key2,  $new_translated_string): self
    {
        $this->translated_strings[$key][$key2] =$new_translated_string;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
