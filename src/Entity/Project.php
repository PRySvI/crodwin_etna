<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
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

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function setLanguages(string $lang): self
    {

            $this->languages[languages.length()+1] = $lang;

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
}
