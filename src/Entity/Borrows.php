<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="borrow")
 * @ApiResource()
 */
class borrows
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    public ?int $id_m;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $person;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $created_at = null;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $date_borrowed = null;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $date_returned = null;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $state_before_borrowed;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $state_after_borrowed;

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
        return (string)$this->id;
    }
}