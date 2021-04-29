<?php $this->load->view('templates/new_header'); ?>
<div class="breadcrumb-div">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" style="color:blue;" aria-current="page">
				<a href="<?php echo site_url('/user/index'); ?>" <?php echo $url == '/user/index' ? 'active' : ''; ?>>首頁</a>
			</li>
			<li class="breadcrumb-item active" style="color:blue;" aria-current="page">
				<a href="#"><?php echo '報表管理';?></a>
			</li>
			<li class="breadcrumb-item active" style="color:blue;" aria-current="page">
				<a href="<?php echo site_url('/report/counseling_member_count_report_table/'.$yearType.'/'.$monthType);?>"><?php echo '每月執行進度表清單';?></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
		</ol>
	</nav>
</div>
<div class="container" style="width: 100%;">
	<div class="row">
		<div class="card-body col-sm-12">
			<!-- <div class="row">
				<div class="col-sm-6">
					<a class="btn btn-success" style="margin:10px;" href="<?php echo site_url('/report/counseling_member_count_report_table/' . $yearType . '/' . $monthType); ?>">←每月執行進度表清單</a>
				</div>
			</div> -->
			<h4 class="card-title text-center"><?php echo $title ?></h4>

			<div class="card-content">
				<form action="<?php echo site_url($url); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $security->get_csrf_token_name() ?>" value="<?php echo $security->get_csrf_hash() ?>" />

					<div class="row justify-content-center">
						<div class="col-sm-5 offset-sm-3">
							<a class="btn btn-primary" href="<?php echo site_url('report/month_member_temp_counseling/' . $yearType . '/' . $monthType); ?>">輔導成效概況表</a>
						</div>
					</div>

					<?php echo isset($error) ? '<p class="text-danger text-center">' . $error . '</p>' : ''; ?>
					<?php echo isset($success) ? '<p class="text-success text-center">' . $success . '</p>' : ''; ?>

					<br /><br />
					<div>
						<h5 class="text-center">提案內容(計劃書)</h5>
					</div>

					<table class="countyDelegateOrganization table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
						<thead>
							<tr>
								<th scope="col">計<br />畫<br />名<br />稱</th>
								<th scope="col">辦<br />理<br />模<br />式</th>
								<th scope="col">辦<br />理<br />方<br />式</th>
								<th scope="col">輔<br />導<br />員<br />數<br />量</th>
								<th scope="col">跨<br />局<br />處<br />會<br />議<br />次<br />數</th>
								<th scope="col">關<br />懷<br />人<br />數</th>
								<th scope="col">輔<br />導<br />人<br />數</th>
								<th scope="col">個<br />別<br />輔<br />導<br />-<br />小<br />時</th>
								<th scope="col">團<br />體<br />輔<br />導<br />-<br />小<br />時</th>
								<th scope="col">生<br />涯<br />探<br />索<br />課<br />程<br />-<br />小<br />時</th>
								<th scope="col">工<br />作<br />體<br />驗<br />-<br />人<br />數</th>
								<th scope="col">工<br />作<br />體<br />驗<br />-<br />小<br />時</th>
								<th scope="col">計<br />畫<br />經<br />費</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td><?php echo $projects->name; ?></td>
								<td><?php foreach ($executeModes as $value) {
										if ($value['no'] == $projects->execute_mode) {

											echo substr($value['content'], 0, 9);
										}
									} ?></td>
								<td><?php foreach ($executeWays as $value) {
										if ($value['no'] == $projects->execute_way) {

											echo $value['content'];
										}
									} ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->counselor_count; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->meeting_count; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->counseling_youth; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->counseling_member; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->counseling_hour; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->group_counseling_hour; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->course_hour; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->working_member; ?></td>
								<td><?php echo (empty($projects)) ? "" : $projects->working_hour; ?></td>
								<td><?php echo number_format($projects->funding); ?></td>
							</tr>


						</tbody>
					</table>

					<br /><br />

					<div>
						<h5 class="text-center">輔導人數統計</h5>
						<?php if ($accumCounselingMemberCount != $monthTempCount) { ?>
							<h6 style="color:red;" class="text-center">請先填寫『輔導成效概況表』</h5><br />
							<?php } ?>
					</div>

					<table class="countyDelegateOrganization table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
						<thead>
							<tr>
								<th scope="col" rowspan="2">核定關懷追蹤人數</th>
								<th scope="col" rowspan="2">累積關懷追蹤人數</th>
								<th scope="col" colspan="5">具輔導成效</th>
								<th scope="col" rowspan="2">尚無規劃人數</th>
								<th scope="col" rowspan="2">不可抗力因素人數</th>

							</tr>
							<tr>
								<th scope="col">已就學人數</th>
								<th scope="col">已就業人數</th>
								<th scope="col">參加職訓人數</th>
								<th scope="col">其他人數</th>
								<th scope="col">小計</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo (empty($projects)) ? "" : $projects->counseling_youth; ?></td>
								<td><?php echo (empty($accumCounselingYouthCount)) ? "0" : $accumCounselingYouthCount; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['alreadyAttendingSchool']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['alreadyWorking']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['training']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['transferLabor'] + $surveyType['transferOtherOne'] + $surveyType['transferOtherTwo']
										+ $surveyType['transferOtherThree'] + $surveyType['transferOtherFour'] + $surveyType['transferOtherFive']
										+ $surveyType['prepareToSchool'] + $surveyType['prepareToWork']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['alreadyAttendingSchool'] + $surveyType['alreadyWorking'] + $surveyType['training']
										+ $surveyType['transferLabor'] + $surveyType['transferOtherOne'] + $surveyType['transferOtherTwo']
										+ $surveyType['transferOtherThree'] + $surveyType['transferOtherFour'] + $surveyType['transferOtherFive']
										+ $surveyType['prepareToSchool'] + $surveyType['prepareToWork']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['familyLabor'] + $surveyType['noPlan'] + $surveyType['lostContact']
										+ $surveyType['pregnancy'] + $surveyType['health'] + $surveyType['other']; ?></td>
								<td><?php echo (empty($surveyType)) ? "0" : $surveyType['specialEducationStudent'] + $surveyType['immigration'] + $surveyType['death']; ?></td>
							</tr>
						</tbody>
					</table>

					<br />

					<table class="countyDelegateOrganization table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
						<thead>
							<tr>
								<th scope="col" rowspan="2">預計輔導人數</th>
								<th scope="col" rowspan="2">累積輔導人數</th>
								<th scope="col" colspan="5">具輔導成效</th>
								<th scope="col" rowspan="2">尚無規劃人數</th>
								<th scope="col" rowspan="2">不可抗力因素人數</th>

							</tr>
							<tr>
								<th scope="col">已就學人數</th>
								<th scope="col">已就業人數</th>
								<th scope="col">參加職訓人數</th>
								<th scope="col">其他人數</th>
								<th scope="col">小計</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo (empty($projects)) ? "" : $projects->counseling_member; ?></td>
								<td><?php echo (empty($accumCounselingMemberCount)) ? "0" : $accumCounselingMemberCount; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->schoolMember; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->workMember; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->vocationalTrainingMember; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->otherNumberOne + $monthMemberTempCounselings->otherNumberTwo + $monthMemberTempCounselings->otherNumberThree; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->otherNumberOne + $monthMemberTempCounselings->otherNumberTwo + $monthMemberTempCounselings->otherNumberThree + $monthMemberTempCounselings->schoolMember + $monthMemberTempCounselings->workMember + $monthMemberTempCounselings->vocationalTrainingMember; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->noPlanMember; ?></td>
								<td><?php echo (empty($monthMemberTempCounselings)) ? "" : $monthMemberTempCounselings->forceMajeureMember + $monthMemberTempCounselings->otherNumberFour; ?></td>
							</tr>
						</tbody>
					</table>

					<br />

					<div>
						<h5 class="text-center">本年度輔導對象來源</h5>
					</div>

					<table class="countyDelegateOrganization table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
						<thead>
							<tr>
								<th scope="col">本年度新開案個案人數</th>
								<th scope="col">前一年度持續輔導人數</th>
								<th scope="col"><?php echo $yearType - 4 ?>學年度動向調查結果輔導人數</th>
								<th scope="col"><?php echo $yearType - 3 ?>學年度動向調查結果輔導人數</th>
								<th scope="col"><?php echo $yearType - 2 ?>學年度動向調查結果輔導人數</th>
								<th scope="col"><?php echo $yearType - 1 ?>學年度動向調查結果輔導人數</th>
								<th scope="col"><?php echo $yearType - 1 ?>年度高中已錄取未註冊結果輔導人數</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo (empty($newCaseCount)) ? "0" : $newCaseCount; ?></td>
								<td><?php echo (empty($oldCaseCount)) ? "0" : $oldCaseCount; ?></td>
								<td><?php echo (empty($twoYearSurvryCaseCount)) ? "0" : $twoYearSurvryCaseCount; ?></td>
								<td><?php echo (empty($oneYearSurvryCaseCount)) ? "0" : $oneYearSurvryCaseCount; ?></td>
								<td><?php echo (empty($nowYearSurvryCaseCount)) ? "0" : $nowYearSurvryCaseCount; ?></td>
								<td><?php echo (empty($nextYearSurvryCaseCount)) ? "0" : $nextYearSurvryCaseCount; ?></td>
								<td><?php echo (empty($highSchoolSurveryCaseCount)) ? "0" : $highSchoolSurveryCaseCount; ?></td>
							</tr>
						</tbody>
					</table>

					<br />

					<div>
						<h5 class="text-center">辦理情形</h5>
					</div>

					<table class="countyDelegateOrganization table table-hover table-bordered align-middle text-center" style="border:2px grey solid;">
						<thead>
							<tr>
								<th scope="col">輔導會談小時</th>
								<th scope="col">生涯探索課程或活動小時</th>
								<th scope="col">工作體驗小時</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo (empty($memberCounselingCount)) ? "0" : $memberCounselingCount->individualCounselingCount + $memberCounselingCount->groupCounselingCount; ?></td>
								<td><?php echo (empty($memberCounselingCount)) ? "0" : $memberCounselingCount->courseAttendanceCount; ?></td>
								<td><?php echo (empty($memberCounselingCount)) ? "0" : $memberCounselingCount->workAttendanceCount; ?></td>

							</tr>
						</tbody>
					</table>
					<br />

					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="course_note" class="form-label">簡述生涯探索課程與工作體驗紀錄(系統代入，不需更改)</label>
							<textarea readonly class="form-control" id="course_note" name="course_note" style="height: 100px" <?php echo ($counselingMemberCountReport) ? '' : '' ?>><?php echo (empty($counselingMemberCountReport)) ? ($courseDetail . $workDetail) : (($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) ? ($courseDetail . $workDetail) : str_replace("<br/>", "\n", $counselingMemberCountReport->course_note . $counselingMemberCountReport->work_note)); ?></textarea>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="force_majeure_note">簡述不可抗力及其他人數之原因(系統代入，不需更改)</label>
							<textarea readonly class="form-control" id="force_majeure_note" name="force_majeure_note" style="height: 100px" <?php echo ($counselingMemberCountReport) ? '' : '' ?>><?php echo (empty($counselingMemberCountReport)) ? $forceMajeureNote : (($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) ? $forceMajeureNote : str_replace("<br/>", "\n", $counselingMemberCountReport->force_majeure_note)); ?></textarea>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="work_trainning_note" class="form-label">簡述參加職訓人數之單位及課程(系統代入，不需更改)</label>
							<textarea readonly class="form-control" id="work_trainning_note" name="work_trainning_note" style="height: 100px" <?php echo ($counselingMemberCountReport) ? '' : '' ?>><?php echo (empty($counselingMemberCountReport)) ? $workTrainningNote : (($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) ? $workTrainningNote : str_replace("<br/>", "\n", $counselingMemberCountReport->work_trainning_note)); ?></textarea>
						</div>
					</div>


					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="funding_execute" class="form-label">已執行金額</label>
							<input class="form-control" type="number" min="0" id="funding_execute" name="funding_execute" value="<?php echo (empty($counselingMemberCountReport)) ? "" : $counselingMemberCountReport->funding_execute ?>" <?php echo (empty($counselingMemberCountReport->funding_execute)) ? "" : "" ?>>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="other_note" class="form-label">簡述本月工作歷程（其他事項）*</label>
							<textarea required class="form-control" id="other_note" name="other_note" <?php echo ($counselingMemberCountReport) ? '' : '' ?>><?php echo (empty($counselingMemberCountReport)) ? "" : str_replace("<br/>", "\n", $counselingMemberCountReport->other_note); ?></textarea>
						</div>
					</div>

					<div>
						<h5 class="text-center">投保情形</h5>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-10 col-md-8 mb-3">
							<label for="insure_note" class="form-label">投保事項</label>
							<textarea readonly class="form-control" id="insure_note" name="insure_note" style="height: 100px" <?php echo ($counselingMemberCountReport) ? '' : '' ?>><?php echo (empty($counselingMemberCountReport)) ? $insuranceDetail : (($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) ? $insuranceDetail : str_replace("<br/>", "\n", $counselingMemberCountReport->insure_note)); ?></textarea>
						</div>
					</div>

					<?php if ($reportLogs) : ?>
						<h5 class="text-center"><?php echo '審核流程' ?></h5>
						<div class="table-responsive">
							<table class="table table-hover table-bordered align-middle text-center">
								<thead class="header">
									<tr>
										<th scope="col">使用者姓名</th>
										<th scope="col">時間</th>
										<th scope="col">狀態</th>
										<th scope="col">評論</th>
									</tr>
								</thead>

								<?php foreach ($reportLogs as $value) { ?>
									<tbody class="scrollable-body">
										<tr>
											<td><?php echo $value['userName'] ?></php>
											</td>
											<td><?php echo $value['time'] ?></php>
											</td>
											<td><?php foreach ($processReviewStatuses as $i) {
													if ($i['no'] == $value['review_status']) {
														echo $i['content'];
													}
												} ?></php>
											</td>
											<td><?php echo $value['comment'] ?></php>
											</td>

										</tr>

									</tbody>
								<?php } ?>

							</table>
						</div>
					<?php endif; ?>

					<br /><br />

					<?php if ($reportProcessesCounselorStatus != $reviewStatus['review_process_pass']) : ?>

						<div class="row justify-content-center">
							<div class="d-grid gap-2 col-sm-6 col-md-4 mb-3">
								<button class="btn btn-primary" type="submit">暫存</button>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="d-grid gap-2 col-sm-6 col-md-4 mb-3">
								<button class="btn btn-primary" name="save" value="Save" type="submit">送出</button>
							</div>
						</div>

					<?php endif; ?>

				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('templates/new_footer'); ?>
