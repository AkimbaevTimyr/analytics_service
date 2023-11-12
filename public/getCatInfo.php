<?php
require_once ('../vendor/autoload.php');
use App\Categories;


error_reporting(E_ALL);
ini_set('display_errors', 1);

$cat_id = $_GET['cat_id'];


if(isset($cat_id)) 
{
    $categories = new Categories();
    $result = $cat_id == 0 ? $categories->get() : $categories->getInfoById($cat_id);
}

?>


<?php if($cat_id == 0): ?>
    <div class="row d-flex justify-content-between mb-5 text-center" > 
        <?php foreach ($result as $cat) : ?>
            <div class="col-sm-4 mb-3">
                <button type="button" class="border-0 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="d-flex align-items-center flex-column justify-content-center">
                        <div class="mb-3">
                            <?= $cat['name'] ?>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                        <div class="mt-3">
                            <?= $cat['total_amount'] ?>
                        </div>
                    </div>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="d-flex flex-wrap justify-content-between">
        <?php foreach($result as $res): ?>
            <div class="card mb-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Сумма : <?= $res['amount'] ?></h5>
                    <p class="card-text"> Описание : <?= $res['description'] ?></p>
                    <p>Дата : <?= $res['date'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
