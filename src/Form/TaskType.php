<?php
//src/Form.FormType.php
namespace App\Form;
use App\Entity\Productlist;
use App\Entity\category;
use App\Entity\unit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('id',TextType::class,array('label'=> 'Code','required'=>true,'constraints'=>[new NotEqualTo('id',Productlist::class)]))
        ->add('active_status',CheckboxType::class,['label'=> 'Active Status','required'=>false])
        ->add('name',TextType::class,array('label'=> 'Name'))
        ->add('categoryID',EntityType::class, array(
            'class'=>Category::class,
            'label'=>'Category',
            'choice_label'=>'category_name'
    ))
        ->add('unitID',EntityType::class,array(
        'class'=>Unit::class,
        'label'=>'Unit',
        'choice_label'=>'unit_name',
        
        )
    
        )
        ->add('price',TextType::class,array('label'=> 'Price'))
        ->add('quantity',TextType::class,array('label'=> 'QOH'))
        ->add('note',TextareaType::class,array('label'=> 'Note'))
        ->add('save',SubmitType::class,array(
            'label'=> 'Save'))
        ;

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'validation_group'=>[
                Productlist::class,'determineValidationGroup'
            ],
        ]);
    }
    
}



?>