<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 *
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

   /* /**
     * @ORM\Column(type="integer")
     */
    //private $user_id;

    /**
     * @ORM\Column(type="array")
     */
    private $languages = array();

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="object")
     */
    private $default_lang;

    /**
     * @ORM\Column(type="boolean")
     */
    private $public_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_blocked = false;

    /*
     * @ORM\Column(type="string", length=255)
     */
   // private $file;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Source", mappedBy="project", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $sources;

    public function __construct()
    {
        $this->sources = new ArrayCollection();
    }

    public function isBlocked(): ?bool
    {
        return $this->id;
    }

    public function setBlocked($val) : ?bool
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function setLanguages(array $langs): self
    {

        $this->languages = $langs;

        return $this;
    }

    public function addLanguage(string $lang): self
    {

        array_push($this->languages , $lang);

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDefaultLang()
    {
        return $this->default_lang;
    }

    public function setDefaultLang($default_lang): self
    {
        $this->default_lang = $default_lang;

        return $this;
    }

    public function getPublicVisible(): ?bool
    {
        return $this->public_visible;
    }

    public function setPublicVisible(bool $public_visible): self
    {
        $this->public_visible = $public_visible;

        return $this;
    }


    public function getOwner(): ?User
    {
        return $this->Owner;
    }

    public function setOwner(?User $Owner): self
    {
        $this->Owner = $Owner;

        return $this;
    }


    public function getSourcesNames()
    {
        if(is_null($this->sources))
            return $this->sources;

        $newSrcs = array();
        foreach ($this->sources as $src)
        {
            $newSrcs[$src->getName()] = $src->getId();
        }

        return $newSrcs;
    }

    /**
     * @return Collection|Source[]
     */
    public function getSources(): Collection
    {
        return $this->sources;
    }

    public function getSourceByName($name)
    {
        if(is_null($this->sources))
            return null;

        foreach ($this->sources as $src)
        {
            if($src->getName()===$name){
                return $src;
            }

        }

        return null;
    }


    public function addSource(Source $source): self
    {
        if (!$this->sources->contains($source)) {
            $this->sources[] = $source;
            $source->setProject($this);
        }

        return $this;
    }

    public function removeSource(Source $source): self
    {
        if ($this->sources->contains($source)) {
            $this->sources->removeElement($source);
            // set the owning side to null (unless already changed)
            if ($source->getProject() === $this) {
                $source->setProject(null);
            }
        }

        return $this;
    }

}
