<?php
namespace App\Controller;

use App\Entity\category;

use App\Entity\Productlist;

use App\Entity\unit;
use App\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    
    /**
     * @Route("/", name="product")
     * @Method({"GET"})
     */
    public function home(Request $request){
        //If I add $categoryID and $name as the function argument it will return an error, and I can not solve it
        //$categoryID,$name
        $product= $this->getDoctrine()->getRepository(Productlist::class)->findAll();
        $form=$this->createFormBuilder() //create form
        
        ->add('name', TextType::class, array('label'=>'Product Name'))
        ->add('categoryID',EntityType::class, array(
            'class'=>Category::class,
            'label'=>'Category',
            'choice_label'=>'category_name'
    ))
        ->add('search',SubmitType::class, array('label'=>'Search'))
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $product=$this->getDoctrine()->getRepository(Productlist::class)->find($categoryID,$name);
            return $this->render('web-files/search.html.twig',array('productlist'=>$product));
        }
        return $this->render('web-files/product.html.twig',array('products'=>$product,'form'=>$form->createView()));
    }

    /**
     * @Route("/product/new", name="new_product")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $product = new Productlist();
        $form = $this->createForm(TaskType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirectToRoute('product');

        }
        return $this->render('web-files/create.html.twig', array('form'=> $form->createView()
        ));
    }

    /**
     * @Route("/product/edit/{id}", name="edit_product")
     * @Method({"GET", "POST"})
     */
    public function edit(Request $request, $id)
    {
        $product = new Productlist();
        $product= $this->getDoctrine()->getRepository(Productlist::class)->find($id);
        $form = $this->createForm(TaskType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirectToRoute('product');

        }
        return $this->render('web-files/edit.html.twig', array('form'=> $form->createView()
        ));
    }

    /**
     * @Route("/product/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete($id){
        $product= $this->getDoctrine()->getRepository(Productlist::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        return $this->redirectToRoute('product');
    }

    
    
    /**
     * @Route("/save/category")
     */
    // public function save(){
    //     $entityManager= $this->getDoctrine()->getManager();
    //     $category = new category();
    //     $category->setCategoryName('Networking');
    //     $entityManager->persist($category);
    //     $entityManager->flush();
    //    return new Response($category->getCategoryName());
    // }

}
