<?php


function ProcessSessionAdd($book){

        $session = Yii::$app->session;

         $bookApi = createCartApiModel($book);

         if (!isset($session['cartItems']) || count($session['cartItems'])==0)
        {
            $bookApi->ItemId = 1;
            $session['cartItems'] = array($bookApi);
        }
        else {

            $myarr = $session['cartItems'];
            $bookApi->ItemId = count($myarr)+1;
            $myarr[] = $bookApi;

            $session['cartItems'] = $myarr;
        }

    }

/**
 * @param $book
 * @return stdClass
 */
function createCartApiModel($book)
{
    $bookApi = new stdClass();

    $bookApi->Title = $book->Title;
    $bookApi->Id = $book->Id;
    $bookApi->Author = $book->Author;
    $bookApi->Description = $book->Description;
    $bookApi->Price = $book->Price;
    $bookApi->Image = $book->Image;
    return $bookApi;
}

function ProcessSessionDelete($Id){

        $session = Yii::$app->session;

        $myarr = $session['cartItems'];


        $myarr = array_filter($myarr,function($item)use($Id){
            if($item->ItemId == $Id)
                return false;
            else
                return true;
        });

        $session['cartItems'] = $myarr;

    }

     function getCartItems()
    {
        $session = Yii::$app->session;

        $myarr = $session['cartItems'];
        return $myarr;
    }

    function clearCart()
    {

        $session = Yii::$app->session;
        $myarr = $session['cartItems'];

        $myarr = [];

        $session['cartItems'] = $myarr;
    }

    ?>