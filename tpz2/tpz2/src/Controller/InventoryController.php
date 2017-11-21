<?php
/**
 * Created by PhpStorm.
 * User: nicolas.horn
 * Date: 20/11/17
 * Time: 14:31
 */

namespace App\Controller;

use App\Entity\Inventory;
use App\Form\InventoryType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class InventoryController extends Controller
{

    /**
     *  @Route("/inventory/new", name="entity_inventory_new")
     */
    public function newInventory(Request $request){
        $inventory = new Inventory();
        $form = $this->createForm(InventoryType::class, $inventory);
        $em = $this->getDoctrine()->getManager();



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($inventory);
            $em->flush();

            return $this->redirect($this->generateUrl('entity_inventory_index'));
        }
        return $this->render('entity/inventory/index.html.twig', array('form' => $form->createView()));
    }

    /**
     *  @Route("/inventory/index", name="entity_inventory_index")
     */
    public function index(){
        $em = $this->getDoctrine()->getManager();
        $inventories = $em->getRepository(Inventory::class)->findAll();
        //find($id)
        //findBy()
        //findOneBy()
        return $this->render('entity/inventory/inventory.html.twig', array("inventory" => $inventories));
    }

    /**
     *  @Route("/inventory/newget", name="entity_inventory_newget")
     */
    public function newGetPostAction(Request $request){
        $inventory = new Inventory();
        $em = $this->getDoctrine()->getManager();
        $form = $this-> createForm(EntityType::class,$inventory);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($inventory);
            $em->flush();
            return $this->redirect($this->generateUrl('entity_inventory_index'));
        }
        return $this->render('entity/inventory/index.html.twig', array('form' => $form->createView()));
    }
    /**
     * @return Response
     * @Route("/inventory/show/{id}", name="entity_inventory_show")
     */
    public function show($id){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Inventory::class);
        $inventory = $repo->find($id);
        return $this->render('entity/inventory/show.html.twig', array('inventory' => $inventory));
    }

}