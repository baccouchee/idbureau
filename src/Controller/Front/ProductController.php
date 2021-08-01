<?php

namespace App\Controller\Front;

use App\Entity\Product;
use App\Entity\Category;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class ProductController extends AbstractController
{
    /**
     *
     * @Route("/product", name="product")
     * @Method("GET")
     */
    public function listeAction()
    {
        $product= $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('listProduct.html.twig',['product'=> $product]);
        
    }

        /**
     * Finds and displays a product details entity.
     *
     * @Route("/product/{id}", name="product_details")
     * @Method("GET")
     */
    public function detailsAction(Product $product)
    {
        $product= $this->getDoctrine()->getRepository(Product::class)->find($product);
      

        return $this->render('productDetails.html.twig',['product'=> $product]);
    }


}
