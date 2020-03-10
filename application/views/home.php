<div id="app" xmlns:v-on="http://www.w3.org/1999/xhtml">

	<div v-if="settingsShow">
<!--	<div >-->

		<div class="modal-dark-bg">
		</div>
		<div class="my-modal-content mb-50">
			<div class="my-modal-group">
				<div class="my-modal-title custom-checkbox mb-0 float-left">Pytanie o czasownik</div>
				<div class="custom-control custom-switch float-right">
					<div class="">
						<select class="custom-select" @change="verbQuestionChange()" v-model="verbQuestionSetting">
							<option value="1" selected>PL</option>
							<option value="2">EN Infinitive</option>
							<option value="3">EN Past simple</option>
							<option value="4">EN Past participle</option>
							<option value="5">Losowo</option>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<hr>
			<div class="my-modal-group">
				<div class="my-modal-title float-left">Nie wyświetlaj tych które już umiem</div>
				<div class="custom-control custom-switch float-right">
					<input type="checkbox" class="custom-control-input" id="repeatVerbs" v-model="repeatVerbs">
					<label class="custom-control-label" for="repeatVerbs"></label>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="my-modal-group" v-if="repeatVerbs">
				<div class="form-group">
					<small class="form-text text-muted mt-10 mb-1">Po ilu poprawnych odpowiedziach przestać powtarzać
						dany czasownik na liście do nauki?</small>
					<input type="text" class="form-control max-100" id="numberOfRepeatVerbs" v-model="numberOfRepeatVerbs">
				</div>
			</div>
			<hr>
			<div class="my-modal-group">
				<div class="my-modal-title float-left">Używać pełnej listy czasowników?</div>
				<div class="custom-control custom-switch float-right">
					<input type="checkbox" class="custom-control-input" id="useFullVerbsList"
						   v-model="useFullVerbsList"
						   @click="settingsSetAllVerbsUse()">
					<label class="custom-control-label" for="useFullVerbsList"></label>
				</div>
				<div class="clearfix"></div>
			</div>
			<div v-if="!useFullVerbsList">
				<div class="mt-20 mb-20" style="max-width: 300px;">
					<select class="custom-select" @change="setVerbsListChange()" v-model="verbsListSelected">
						<option value="" disabled>Wybierz grupę</option>
						<option v-for="group in allGroups" :value="group.id" :key="group.id">
							{{ group.groupName }}
						</option>
<!--						<option value="1">Wszystkie bez tych które umiem na 100%</option>-->
					</select>
				</div>
				<div v-if="pickAnyGroupError" class="pick-any-verb-error">
					Wybierz grupę lub użyj pełnej listy.
				</div>
				<div :class="{'full-verbs-list-select': group.id != 0}">
					<div v-for="verb in verbs" v-if="group.id != 0">
						{{verb.inf}} - {{verb.pastSimp1}} - {{verb.pastPrac1}} &rarr; {{verb.pl}}
					</div>
				</div>
			</div>
			<hr>
			<button type="button" class="verb-btn verb-btn-info float-right" v-on:click="saveSettings()">Zastosuj</button>
		</div>
	</div>

	<div class="container mt-100">
		<div class="row">
			<div class="col-sm-12">

				<div class="home-container">
					<div class="home-home-menu" @click="goTo('')">Home</div>
					<div class="home-verbs-options-menu" @click="goTo('verbs')">Czasowniki</div>
					<div class="home-words-options-menu" @click="goTo('addWord')">Słowa</div>
					<div class="home-groups-options-menu" @click="goTo('groups')">Grupy</div>

					<div class="learch-button" :class="{ 'uk-active2' : active == true}"
						 @mouseover="active = true" @mouseleave="active = false">
						Nauka czasowników <i class="fa fa-chevron-down learn-icon"></i><br>
						<span :class="{ 'uk-active' : active == true}" style="display: none">Nauka słów EN</span>
					</div>
					<form>

						<div class="form-row">
							<div class="col verb-pl-name">{{verbShowTypeSetting}}</div>
							<div v-if="correctAnswers" class="correct-answers-top">
								<div class="correct-answers">
									{{presentVerb.inf}} - {{presentVerb.pastSimp1}} - {{presentVerb.pastPrac1}}
								</div>
							</div>
							<div id="settings" class="ml-20"><i class="fa fa-link" v-on:click="linkShow = true"></i></div>
							<div id="settings" class="ml-20"><i class="fa fa-cogs" v-on:click="settingsShow = true"></i></div>
						</div>
						<div class="form-row">
							<div class="context">{{presentVerb.plAdditional}}</div>
						</div>
						<hr class="mb-0">
						<div class="form-row verbs-form">
							<div class="col-md-4 col-sm-12 pb-1">
								<label class="my-label-in-form">infinitive</label>
								<input type="text" class="form-control" ref="fieldInfVerb" v-model="verbInf">
							</div>
							<div class="col-md-4 col-sm-12 pb-1">
								<label class="my-label-in-form">past simple</label>
								<input type="text" class="form-control" v-model="verbPastSimple">
							</div>
							<div class="col-md-4 col-sm-12 pb-1">
								<label class="my-label-in-form">past practiciple</label>
								<input type="text" class="form-control" v-model="verbPastParticiple">
							</div>
						</div>
					</form>
					<hr>
					<div v-if="!allBtnDisabled">
						<button type="button" class="verb-btn verb-btn-success" @click="checkVerbs" :disabled="chechBtnDisabled">
							<i class="fa fa-check"></i> Sprawdź</button>
						<button type="button" class="verb-btn verb-btn-info" @click="showHints">
							<i class="fa fa-graduation-cap"></i> Nauka</button>
						<button type="button" class="verb-btn verb-btn-info" @click="newVerb" ref="newVerbBtn">
							<i class="fa fa-forward"></i> Nowy</button>
						<button type="button" class="verb-btn verb-btn-info float-right" @click="addVerbToGroup()">
							<i class="fa fa-plus"></i> Dodaj do grupy</button>
<!--						<button type="button" class="verb-btn verb-btn-default" @click="test()">test</button>-->
					</div>
					<button type="button" class="verb-btn verb-btn-default" @click="goTo('refresh')" v-if="allBtnDisabled">Rozpocznij od nowa</button>
					<div class="clearfix"></div>

					<div v-if="correctAnswers">
						<hr>
						<div class="mb-10">Poprawne odpowiedzi: </div>
						<div class="correct-answers">
							{{presentVerb.pl}}
						</div>
						<div class="correct-answers">
							{{presentVerb.inf}} - {{presentVerb.pastSimp1}} - {{presentVerb.pastPrac1}}
						</div>
					</div>

					<div class="alert alert-warning field-info" role="alert" v-if="emptyFieldsError">Wypełnij wszytkie pola</div>
					<div class="alert alert-success field-info" role="alert" v-if="allVerbsCorrect && !allBtnDisabled">Brawo Ty!</div>
					<div class="alert alert-success field-info" role="alert" v-if="allBtnDisabled">Brawo! Poprawnie podano wszytkie czasowniki z listy!</div>
					<div class="alert alert-danger field-info" role="alert" v-if="isSomeError">Nope - mamy błędy :/</div>
				</div>

			</div>
		</div>
	</div>
	
	<div class="container mb-50 mt-100" v-if="repeatVerbs">
		<div class="row">
			<div class="col-sm-12">
				<div class="home-container">

					<div class="row">
						<div class="col-md-2 col-sm-6">
							<div class="already-known-discription">Pozostało</div>
							<div class="big-number">{{verbs.length}}</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="already-known-discription">Umiesz już</div>
							<div class="big-number">{{verbsListKnown.length}}</div>
						</div>
						<div class="col-md-8 col-sm-12">
							<div>
								<div class="float-left">Lista poznanych czasowników</div>
								<div class="float-right">
									Ilość pomyłek: {{numberOfmistakes}}
								</div>
								<div class="clearfix"></div>
							</div>
							<hr>
							<div class="alerady-known-list">
								<div v-for="verb in verbsListKnown">
									<strong>{{verb.inf}} - {{verb.pastSimp1}} - {{verb.pastPrac1}} &rarr; {{verb.pl}}</strong>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
	<transition name="fade">
		<div class="modal-dark-bg" v-if="linkShow || addToGroupShow"></div>
	</transition>
	<transition name="fade2">
		<div class="my-modal-content mb-50" v-if="linkShow">

			<div class="my-modal-group">
				<div class="my-modal-title">Link do obecnych ustawień</div>
				<small class="form-text text-muted mt-0 mb-1">- możesz użyć tego linku aby podać go komuś innemu lub
					za jakiś czas przejść do ćwiczeń z takim ustawieniem
				</small>
			</div>

			<hr>
			<div id="sharedlink">
				{{shareLink}}
			</div>
			<hr>
			<transition name="fade">
				<div class="float-left" v-if="linkCopyOk2">link został skopiowany</div>
			</transition>
			<button type="button" class="btn btn-sm btn-danger float-right ml-1" v-on:click="linkShow = false">Zamknij</button>
			<button type="button" class="btn btn-sm btn-secondary float-right ml-1" v-on:click="copyLink()">Kopiuj link</button>
		</div>
	</transition>
	{{addVerbToGroupGroupChosen}}
	<transition name="fade3">
		<div class="my-modal-main-content mb-50" v-if="addToGroupShow">

			<div class="form-row">
				<div class="col"><h4>Dodaj do grupy</h4></div>
				<button type="button" class="verb-btn verb-btn-success float-right ml-1" v-on:click="addToGroupClose()">x</button>
			</div>
			<hr>
			<div class="verb-about">
				<div class="row">
					<div class="col-sm-8">
						<select class="custom-select" v-model="addVerbToGroupGroupChosen">
							<option value="" disabled>Wybierz grupę</option>
							<option v-for="group in allGroups" :value="group.id">
								{{ group.groupName }}
							</option>
						</select>
					</div>
					<div class="col-sm-4 text-right">
						<button class="verb-btn verb-btn-info" @click="addVerbToGroupSave"
								v-if="addVerbToGroupGroupChosen != ''">Dodaj</button>
					</div>
				</div>
			</div>
			<div class="form-row mt-30">
				<div class="col"><h4>Czasownik przynależy do grup</h4></div>
			</div>
			<hr>
			<div class="verb-about">
				- Wszystkie czasowniki
				<div v-for="group in groupsInWitchVerbIs" v-if="group.groupName != 'Wszystkie czasowniki'">
					<hr class="mt-10 mb-10">

					<div class="row">
						<div class="col-sm-12">
							- {{group.groupName}}
						</div>
					</div>
				</div>
			</div>
			<hr>
		</div>
	</transition>
</div>
</body>
	<script type="text/javascript" src="content/js/home.js"></script>
</html>
