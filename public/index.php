<?php 
use App\Categories;
use App\Summaries;
use App\Transactions;
require_once ('../vendor/autoload.php');
session_start();
$user_id = $_SESSION['user_id'] ?? '';

$cat = new Categories();
$summaries = new Summaries();

$categories = $cat->get($user_id);

$data = $_POST;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $cat_id = $_POST['category_id'];
    
    $summaries->addSum($cat_id, $amount, $description, $user_id);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php if(isset($_SESSION['user'])): ?>
        <div class="container-sm">
            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Transactions</button>
                </li>
                <li class="nav-item" role="presentation">
                    <form action="logout.php" method="post">
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex align-items-center">
                    <select class="form-select form-select-lg mb-3 mt-3" aria-label=".form-select-lg example" onclick="handleSelect(event)">
                        <option value="0" selected>Все</option>
                        <option value="1">Продукты</option>
                        <option value="2">Транспорт</option>
                        <option value="3">Покупки</option>
                        <option value="4">Подарки</option>
                        <option value="5">Кафе</option>
                        <option value="6">Другое</option>
                    </select>
                    <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                </div>
                <div class="row mt-5" style="min-height: 500px">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-9">
                        <div id="categories_block">
                            <div class="row d-flex justify-content-between mb-5 text-center" > 
                                <?php foreach ($categories as $cat) : ?>
                                    <div class="col-sm-4 mb-3">
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
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Добавить сумму</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div>
                                                <form method="POST" target="_self" id="form" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                    <div class="modal-body">
                                                        <div class="input-group flex-nowrap mb-3">
                                                            <input type="text" class="form-control" placeholder="Введите сумму"  type="text" name="amount" aria-label="Username" aria-describedby="addon-wrapping">
                                                        </div>
                                                        <div class="input-group flex-nowrap mb-3">
                                                            <input type="text" class="form-control" placeholder="Введите описание"  type="text" name="description" aria-label="Username" aria-describedby="addon-wrapping">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupSelect01">Категории</label>
                                                            <select class="form-select" name="category_id">
                                                                <option value="1">Продукты</option>
                                                                <option value="2">Транспорт</option>
                                                                <option value="3">Покупки</option>
                                                                <option value="4">Подарки</option>
                                                                <option value="5">Кафе</option>
                                                                <option value="6">Другое</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php 
                    $model = new Transactions();
                    $data = $model->getAll($user_id);
                    $transactions = $data['transactions'];
                    $dailySummary = $data['dailySummary'];
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                            <div class="mt-5">
                                <div class="accordion" id="accordionExample">
                                    <?php foreach($dailySummary as $summary): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?= $summary['id'] ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $summary['id'] ?>" aria-expanded="false" aria-controls="<?= $summary['id'] ?>">
                                                <?= $summary['date']?> : <?= $summary['total_amount']?>
                                            </button>
                                            </h2>
                                            <div id="collapse<?= $summary['id'] ?>" class="accordion-collapse collapse " aria-labelledby="<?= $summary['id'] ?>" data-bs-parent="#accordionExample">
                                                <ul>
                                                    <?php foreach($transactions as $transaction): ?>
                                                        <?php if ($transaction['date'] == $summary['date']): ?>
                                                            <li><?= $transaction['amount']?> : <?= $transaction['description']?></li>
                                                        <?php endif; ?>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
    <?php else: ?>
        <?php 
            header("Location: loginform.php");    
        ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        function handleSelect(e){
            let user_id = "<?= $user_id ?>";
            let cat_id = e.target.value;
            let categories_block = $("#categories_block");

            $.ajax({
                url: 'getCatInfo.php',
                method: 'GET',
                data: {
                    cat_id,
                    user_id
                },
                success: function (resp) {
                    categories_block.html('');
                    categories_block.html(resp)
                },
                error: function (error){
                    alert('Произошла ошибка')
                }
            })
        }

    </script>
</body>

</html>


