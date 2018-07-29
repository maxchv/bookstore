<?php



namespace app\controllers;
use app\models\Book;
use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
include_once   \Yii::$app->basePath."\Servises\AccountSessionService.php";

class HomeController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['http://www.myserver.net'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                ],
                'actions' => [
                    'login' => [
                        'Access-Control-Allow-Credentials' => true,
                    ]
                ]
            ],
        ], parent::behaviors());
    }

    public function actionIndex()
    {

        $books = Book::find()
            ->orderBy(['AddedDate'=>'SORT_DESC'])
            ->all();

        $categories = Category::find()->limit(3)->all();

        return $this->render("index", ['books' => $books,'categories'=>$categories]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();


        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login())
            return $this->goBack();


        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

}
