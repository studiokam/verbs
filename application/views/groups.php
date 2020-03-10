<div id="app">
	<div class="container mt-100">
		<div class="row">
			<div class="col-sm-6 zi-100">
				<div class="add-new-verb">
					<a class="add-menu" :href="baseUrl">Home</a>
					<div class="edit-verb-menu" v-if="showEditGroup"
						 @click="endVerbEdit">
						Wyjdź z edycji
					</div>
					<div class="form-row">
						<div class="col verb-pl-name" v-if="!showEditGroup">Nowa grupa</div>
						<div class="col verb-pl-name" v-if="showEditGroup">Edycja grupy</div>
					</div>
					<hr class="mb-0">
					<div class="form-row verbs-form">
						<div class="col-md-12 pb-1">
							<label class="my-label-in-form">Nazwa grupy *</label>
							<input type="text" class="form-control" v-model="groupName">
						</div>
						<div class="col-md-12 pb-1">
							<label class="my-label-in-form">Dodatkowy opis</label>
							<textarea
								name="groupAdditional" rows="2" class="form-control"
								v-model="groupAdditional">
							</textarea>
						</div>
					</div>
					<button type="button" class="btn btn-success btn-block mt-20" @click="addGroup"
							v-if="!showEditGroup">Dodaj</button>
					<div>
						<div class="row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-info btn-block mt-20"
										@click="editGroupSend()" v-if="showEditGroup">Zapisz</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 ml--40" v-if="!showEditGroup">
				<div class="add-new-verb">
					<div class="form-row">
						<div class="col verb-pl-name">Wszystkie grupy</div>
					</div>
					<div class="verb" v-for="group in allGroups">
						<hr>
						<div class="row">
							<div class="col-sm-10">
								<strong>{{group.groupName}}</strong><br>
								<small style="color: #bbb;">Liczba czasowników przypisana do grupy: {{group.verbsInGroup}}</small>
							</div>
							<div class="col-sm-2 text-right">
								<i class="verbs-list-edit fa fa-cog" @click="editGroup(group.id)"></i>
								<i class="verbs-list-delete fa fa-times" @click="deleteGroup(group.id)"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 ml--40" v-if="showEditGroup">
				<div class="add-new-verb">
					<div class="form-row">
						<div class="verb-pl-name">
							<span style="font-size: 28px;">Czasowniki przynależne do grupy</span>
						</div>
						<small style="color: #bbb;">Można je usunąć, aby dodać nowe przejdź do czasowników</small>
					</div>
					<div class="verb" v-for="verb in allVerbsForGroup">
						<hr>
						<div class="row">
							<div class="col-sm-10">
								{{verb.inf}} - {{verb.pastSimp1}} - {{verb.pastPrac1}} -> {{verb.pl}}
							</div>
							<div class="col-sm-2 text-right">
								<i class="verbs-list-delete fa fa-times" @click="deleteVerbFromGroup(verb.relationId)"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</body>
	<script type="text/javascript" src="content/js/groups.js"></script>
</html>
