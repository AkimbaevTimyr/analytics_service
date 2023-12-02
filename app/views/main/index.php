<?php
	$date1 = date('Y-m-d', strtotime('-1 month'));
	$date2 = date('Y-m-d');
?>

<div>
	<div class="row wrapper border-bottom bg-white pb-2">
		<div class="col-lg-12">
			<div class="text-center animated fadeInDown">
				<h2>Активность пользователей по сервису соцсетей</h2>
			</div>
			<form class="col-lg-12 pt-3">
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
                        <ul class="nav nav-tabs pt-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">Вконтакте</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Facebook</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Twitter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Instagram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">YouTube</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-9">Telegram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-all">Все соцсети</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
							<?php foreach($types as $type): ?>
								<div role="tabpanel" id="tab-<?=$type?>" class="tab-pane <?if($type==1) echo 'active';?>">
									<div class="panel-body">
										<table style="text-align:center;" class="table table-striped">
											<tr style='font-weight: bold;'>
												<td>Аккаунт</td>
												<td style='background-color: #dbdbdb;'>Всего</td>
												<td>Добавлено в проект</td>
												<td>Дубликатов (было в проекте)</td>
												<td>Добавлено в систему, но не в проект</td>
												<td>Ошибка сбора</td>
												<td>В очереди</td>
											</tr>
											<?php foreach($userStats as $user): ?>
                                                <?php if($type == $user['type']): ?>
                                                    <tr>
                                                        <td><?= $user['username'] ?></td>
                                                        <td><?= $user['count'] ?></td>
														<td><?= $user['count'] ?></td>
														<td>0</td>
														<td>0</td>
														<td>0</td>
														<td>0</td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
												<!-- if($user['username']!='total'){
													echo "<tr>";
														echo '<td><a href="/service_stat_one.php?username='.$user['username'].'&s_date='.$date1.'&f_date='.$date2.'" target="_blank">'.$user['username'].'</a></td>';
														if(isset($user['total'][$type])) echo "<td style='background-color: #dbdbdb;'>".$user['total'][$type]."</td>";
														else echo "<td style='background-color: #dbdbdb;'>0</td>";
														if(isset($user['done_win'][$type])) echo "<td>".$user['done_win'][$type]."</td>";
														else echo "<td>0</td>";
														if(isset($user['dublicate'][$type])) echo "<td>".$user['dublicate'][$type]."</td>";
														else echo "<td>0</td>";
														if(isset($user['done'][$type])) echo "<td>".$user['done'][$type]."</td>";
														else echo "<td>0</td>";
														if(isset($user['delete'][$type])) echo "<td>".$user['delete'][$type]."</td>";
														else echo "<td>0</td>";
														if(isset($user['types'][$type])) echo "<td>".$user['types'][$type]."</td>";
														else echo "<td>0</td>";
													echo "</tr>";
												}
											}
											// echo "<tr style='font-weight:bold'>";
											// 	echo "<td>Итого</td>";
											// 	if(isset($users['total']['total'][$type])) echo "<td style='background-color: #dbdbdb;'>".$users['total']['total'][$type]."</td>";
											// 	else echo "<td style='background-color: #dbdbdb;'>0</td>";
											// 	if(isset($users['total']['done_win'][$type])) echo "<td>".$users['total']['done_win'][$type]."</td>";
											// 	else echo "<td>0</td>";
											// 	if(isset($users['total']['dublicate'][$type])) echo "<td>".$users['total']['dublicate'][$type]."</td>";
											// 	else echo "<td>0</td>";
											// 	if(isset($users['total']['done'][$type])) echo "<td>".$users['total']['done'][$type]."</td>";
											// 	else echo "<td>0</td>";
											// 	if(isset($users['total']['delete'][$type])) echo "<td>".$users['total']['delete'][$type]."</td>";
											// 	else echo "<td>0</td>";
											// 	if(isset($users['total']['types'][$type])) echo "<td>".$users['total']['types'][$type]."</td>";
											// 	else echo "<td>0</td>";
											// echo "</tr>";?> -->
										</table>
									</div>
								</div>
							<?php endforeach; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>