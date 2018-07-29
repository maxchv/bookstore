<?php

namespace app\controllers;

use app\models\Category;
use app\models\UploadedImage;
use Yii;
use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdminpanelbookController implements the CRUD actions for Book model.
 */
class AdminpanelbookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->layout = '@app/views/layouts/adminpanel';

        if(Yii::$app->user->isGuest)
            $this->redirect("/adminpanel/login");

        return parent::beforeAction($action);
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUploadimage($Id){

        $modelFile = new UploadedImage();

        if(Yii::$app->request->isPost){

            $picPath = $this->SaveImage($modelFile);

            $book = $this->UpdateBook($Id, $picPath);

            return $this->render('view', [
                'model' => $book,
            ]);
        }

        return $this->render('uploadimage', [
            'model' => $modelFile,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        $categories = Category::find()->all();

        if(Yii::$app->request->isPost) {

            $model->load(Yii::$app->request->post());
            $model->save();

            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,'categories'=>$categories,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = Category::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,'categories'=>$categories
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $modelFile
     * @return string
     */
    protected function SaveImage($modelFile)
    {
        $modelFile->Image = UploadedFile::getInstance($modelFile, 'Image');

        $prefix = 'img/product-img/';
        $fileNameNormilize = strtolower(md5($modelFile->Image->baseName));

        $picPath = $prefix . $fileNameNormilize . '.' . $modelFile->Image->extension;

        $modelFile->Image->saveAs(Yii::getAlias('@web') . $prefix . $fileNameNormilize . '.' . $modelFile->Image->extension);
        return $picPath;
    }

    /**
     * @param $Id
     * @param $picPath
     * @return Book
     */
    protected function UpdateBook($Id, $picPath)
    {
        $book = $this->findModel($Id);

        $book->Image = $picPath;

        $book->save();
        return $book;
    }
}
