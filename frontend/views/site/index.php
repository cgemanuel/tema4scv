<?php
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Yii 2 Build';
?>

<?php
NavBar::begin([
    'brandLabel' => 'Yii 2 Build',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-dark bg-dark fixed-top'],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav mr-auto'],
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => [
        Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'nav-item']]
        ) : (
            '<li class="nav-item">'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link nav-link']
            )
            . Html::endForm()
            . '</li>'
        ),
        Yii::$app->user->isGuest ? (
            ['label' => 'Signup', 'url' => ['/site/signup'], 'options' => ['class' => 'nav-item']]
        ) : '',
    ],
]);
NavBar::end();
?>

<div class="site-index" style="padding-top: 60px;">

    <div class="jumbotron text-center">
        <h1>Yii 2 Build <i class="fa fa-plug"></i></h1>
        <p class="lead">Use esta plantilla de Yii 2 para comenzar Proyectos.</p>
        

    </div>

    <div class="container">
        <!-- Reemplazo simple del Collapse -->
        <div class="mb-4">
            <div class="card">
                <div class="card-header">
                    <a class="d-block" data-toggle="collapse" href="#featuresCollapse">
                        Características Principales
                    </a>
                </div>
                <div id="featuresCollapse" class="collapse show">
                    <div class="card-body">
                        Aquí puede añadir contenido sobre las características principales sin plugins sociales.
                    </div>
                </div>
            </div>
            
            <div class="card mt-2">
                <div class="card-header">
                    <a class="d-block" data-toggle="collapse" href="#resourcesCollapse">
                        Recursos Principales
                    </a>
                </div>
                <div id="resourcesCollapse" class="collapse">
                    <div class="card-body">
                        Aquí puede añadir contenido sobre recursos principales sin plugins sociales.
                    </div>
                </div>
            </div>
        </div>

        <?php
        Modal::begin([
            'title' => '<h2>Últimos Comentarios</h2>',
            'toggleButton' => ['label' => 'comentarios', 'class' => 'btn btn-primary'],
        ]);

        echo 'Sección de comentarios (puede integrar otro sistema si lo desea).';

        Modal::end();
        ?>

        <br/>
        <br/>

        <?php
        echo Alert::widget([
            'options' => [
                'class' => 'alert-info',
            ],
            'body' => 'Lance su proyecto como un cohete...',
        ]);
        ?>

        <div class="body-content">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Gratis</h2>

                    <p>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            echo Yii::$app->user->identity->username . ' está haciendo cosas geniales. ';
                        }
                        ?>
                        Partiendo de esta plantilla de código abierto y gratuita de Yii 2 ahorrará mucho tiempo.
                        Puede entregar proyectos al cliente rápidamente, con mucho de código ya disponible, para
                        que pueda concentrarse en los asuntos complejos.
                    </p>

                    <p>
                        <a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc-2.0/guide-index.html">Documentación de Yii &raquo;</a>
                    </p>
                </div>

                <div class="col-lg-4">
                    <h2>Ventajas</h2>

                    <p>
                        La facilidad de uso es una enorme ventaja. Hemos simplificado el RBAC y le hemos
                        otorgado tipos de usuario Gratuito/Pago de manera predeterminada.
                    </p>

                    <p>
                        <a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Foro de Yii &raquo;</a>
                    </p>
                </div>

                <div class="col-lg-4">
                    <h2>¡Codifique Rápidamente, Codifique Correctamente!</h2>

                    <p>
                        Libere el poder del asombroso framework Yii 2 con esta plantilla mejorada.
                        Con base en la plantilla avanzada de Yii 2, obtiene una implementación de frontend y
                        backend completa que presenta una IU rica para la administración del backend.
                    </p>

                    <p>
                        <a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Extensiones de Yii &raquo;</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>