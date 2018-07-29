<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 7/25/2018
 * Time: 1:46 PM
 */

namespace app\controllers;

use Yii;
use StdClass;
use app\models\Book;
use app\models\Category;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex($paginationId=1,$categoryId=null,$author=null){

        if(!$categoryId==null)
            $books = Book::find()->where(['CategoryId' => $categoryId])->all();
        else if(!$author==null)
            $books = Book::find()->where(['Author'=> $author])->all();
        else
            $books = Book::find()->all();

        $booksCount = count($books);
        $books = array_slice($books,--$paginationId*9,9);
        $categories = Category::find()->all();

        return $this->render("index",["books"=>$books,"categories"=>$categories,'paginationId'=>$paginationId,'overalBooksAmount'=>$booksCount]);
    }

    public function actionSearch($searchString,$paginationId=1){

        $res = Book::find()->where(['Author'=>$searchString])->orWhere(['Title'=>$searchString])
            ->orFilterWhere( ['like', 'Description', $searchString])->all();
        $categories = Category::find()->all();

        return $this->render("index",["books"=>$res,"categories"=>$categories,'paginationId'=>$paginationId]);

    }

    public function actionDetails($id){

        $book = Book::find()->where(['Id'=>$id])->one();

        return $this->render("details",['book'=>$book]);
    }

}