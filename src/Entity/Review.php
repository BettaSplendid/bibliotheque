<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Entity\Book;

/**
 * @ORM\Entity
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $review_id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $grade;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @ORM\Column(length="100")
     */
    private string $text_comment;

    /**
     * @OneToOne(targetEntity="Book")
     * @JoinColumn(name="associated_book", referencedColumnName="ISBN")
     */
    private Book $associated_book;

    public function __construct($associated_book, $grade, $textcomment )
    {
        $this->associated_book = $associated_book;
        $this->grade = $grade;
        $this->textcomment = $textcomment;
    }
}
