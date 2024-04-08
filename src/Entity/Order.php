<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product = null;

    #[ORM\Column(length: 255)]
    private ?string $payment_method = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $ts = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?address $biling = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?address $shipping = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTs(): ?\DateTimeInterface
    {
        return $this->ts;
    }

    public function setTs(\DateTimeInterface $ts): static
    {
        $this->ts = $ts;

        return $this;
    }

    public function getBiling(): ?address
    {
        return $this->biling;
    }

    public function setBiling(?address $biling): static
    {
        $this->biling = $biling;

        return $this;
    }

    public function getShipping(): ?address
    {
        return $this->shipping;
    }

    public function setShipping(?address $shipping): static
    {
        $this->shipping = $shipping;

        return $this;
    }
}
