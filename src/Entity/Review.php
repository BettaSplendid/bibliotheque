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

    public function __construct(Book $associated_book, int $grade, string $text_comment)
    {
        $this->associated_book = $associated_book;
        $this->grade = $grade;
        $this->text_comment = $text_comment;
    }

    /**
     * Get the value of text_comment
     */ 
    public function getText_comment()
    {
        return $this->text_comment;
    }

    /**
     * Set the value of text_comment
     *
     * @return  self
     */ 
    public function setText_comment($text_comment)
    {
        $this->text_comment = $text_comment;

        return $this;
    }

    /**
     * Get the value of grade
     */ 
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get the value of review_id
     */ 
    public function getReview_id()
    {
        return $this->review_id;
    }

    /**
     * Set the value of review_id
     *
     * @return  self
     */ 
    public function setReview_id($review_id)
    {
        $this->review_id = $review_id;

        return $this;
    }
}
