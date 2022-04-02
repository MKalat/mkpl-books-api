<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="book")
 * @ApiResource(
 *      normalizationContext={"groups" = {"read"}},
 *      denormalizationContext={"groups" = {"write"}},
 *      itemOperations={
 *          "get"={"access_control"="is_granted('ROLE_USER')"}
 *          "put"={"access_control"="is_granted('ROLE_USER')"}
 *          "delete"={"access_control"="is_granted('ROLE_USER')"}
 *          "patch"={"access_control"="is_granted('ROLE_USER')"}
 *     },
 * )
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $title;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $original_title;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $genre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    public ?int $count;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $date_pub = null;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $publisher;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $pub_lang;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $ISBN;

    /**
     * @ORM\Column(length=4096)
     * @Assert\NotBlank()
     */
    public string $description;

    /**
     * @ORM\Column(length=255)
     * @Assert\NotBlank()
     */
    public string $owner_name_surname;

    /**
     * @ORM\Column(length=255)
     * @Assert\NotBlank()
     */
    public string $owner_address;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $shop_name;

    /**
     * @ORM\Column(length=255)
     * @Assert\NotBlank()
     */
    public string $shop_address;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $shop_www;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    public ?int $page_count;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $format;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $cover;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $price_bought;

    /**
     * @ORM\Column(length=70, unique=true)
     * @Assert\NotBlank()
     */
    public string $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    public bool $favourite = false;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $created_at = null;


    /******** METHODS ********/

    public function getId()
    {
        return $this->id;
    }

    /**
     * Prepersist gets triggered on Insert
     * @ORM\PrePersist
     */
    public function updatedTimestamps()
    {
        if ($this->created_at == null) {
            $this->created_at = new \DateTime('now');
        }
    }

    public function __toString()
    {
        return $this->title;
    }
}
