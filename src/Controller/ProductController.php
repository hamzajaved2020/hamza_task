<?php

namespace App\Controller;

use App\Annotation\Get;
use App\ArgumentResolver\QueryParam;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\Uuid;

class ProductController extends AbstractController
{
    /**
     * @param PostRepository $product
     */
    public function __construct(private readonly ProductRepository $product)
    {
    }

    // function all(string $category,int $priceLessThen): Response
    // see: https://github.com/symfony/symfony/issues/43958
    // #[Route(path: "products", name: "all", methods: ["GET"])]
    #[Get(path: "products", name: "all")]
    public function all(#[QueryParam] string $category,#[QueryParam] int $priceLessThen,#[QueryParam] int $limit): Response
    {
        $data = $this->product->findProducts($category ?: '',$priceLessThen,$limit);
        return $this->json($data);
    }
}
