<?php
$date1 = date('Y-m-d', strtotime('-1 month'));
$date2

?>

<div>
	<div class="row wrapper border-bottom bg-white pb-2">
		<div class="col-lg-12">
			<div class="text-center animated fadeInDown">
				<h2>Активность пользователей по сервису соцсетей</h2>
			</div>
			<form class="col-lg-12">
				<div class="form-group col-lg-12">
					<span>Начальная дата: </span><input type="date" name="s_date" value="<?=$date1?>">
					<span>Конечная дата: </span><input type="date" name="f_date" value="<?=$date2?>">
					<input type="submit" value="Показать">
				</div>
			</form>
		</div>
	</div>
     <div class="wrapper wrapper-content animated fadeInRight bg-white">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox ">
					<div class="ibox-content">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home">Вконтакте</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu1">Facebook</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu2">Twitter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu3">Instagram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu4">YouTube</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu5">Telegram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu6">Все соцсети</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane container active" id="home">1</div>
                            <div class="tab-pane container fade" id="menu1">2</div>
                            <div class="tab-pane container fade" id="menu2">3</div>
                            <div class="tab-pane container fade" id="menu3">4</div>
                            <div class="tab-pane container fade" id="menu4">5</div>
                            <div class="tab-pane container fade" id="menu5">6</div>
                            <div class="tab-pane container fade" id="menu6">7</div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>