<?php 
use App\Transactions;
require_once ('../vendor/autoload.php');

$model = new Transactions();
$data = $model->getAll();
$transactions = $data['transactions'];
$dailySummary = $data['dailySummary'];


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <div class="d-flex">
                    <header>Transactions</header>
                    <button class="btn btn-primary">
                        <a href="index.php" class="text-white">Back</a>
                    </button>
                </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

    </script>
</body>

</html>


