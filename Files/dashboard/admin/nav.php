
<ul id="main-menu" class="" >
			
    <li id="dash"><a href="index.php"><i class="entypo-gauge"></i><span>Panel de Control</span></a></li>
                
	<li id="regis"><a href="Nuevo_registro.php"><i class="entypo-user-add"></i><span>Nuevo registro</span></a>                
				
	<li id="paymnt"><a href="Pagos.php"><i class="entypo-star"></i><span>Pagos</span></a></li>

	<li class="" id="hassubopen"><a href="#" onclick="memberExpand(1)"><i class="entypo-users"></i><span>Miembros</span></a>
		<ul id="memExpand">
			<li class="active">
				<a href="ver_miembros.php"><span>Editar miembros</span></a></li>

			<li><a href="ver_tabla.php"><span>Ver miembro</span></a></li>
		</ul>
	</li>

	<li id="health_status"><a href="new_health_status.php"><i class="entypo-user-add"></i><span>Estado de salud</span></a> 	

		<li class="" id="planhassubopen"><a href="#" onclick="memberExpand(2)"><i class="entypo-quote"></i><span>Plan</span></a>

		<ul id="planExpand">
			<li class="active">
				<a href="Nuevo_Plan.php"><span>Nuevo Plan</span></a></li>

			<li><a href="view_plan.php"><span>Editar detalles de suscripción</span></a></li>
		</ul>

	<li class="" id="overviewhassubopen"><a href="#" onclick="memberExpand(3)"><i class="entypo-box"></i><span>Descripción general</span></a>

		<ul id="overviewExpand">
			<li class="active">
				<a href="over_members_month.php"><span>Miembros por mes</span></a>
			</li>

			<li>
				<a href="over_members_year.php"><span>Miembros por año</span></a>
			</li>

			<li>
				<a href="revenue_month.php"><span>Ingresos por mes</span></a>
			</li>			

		</ul>

	<li class="" id="routinehassubopen"><a href="#" onclick="memberExpand(4)"><i class="entypo-alert"></i><span>Rutina de ejercicios</span></a>

		<ul id="routineExpand">
			<li class="active">
				<a href="addroutine.php"><span>Agregar rutina</span></a>
			</li>

			<li>
				<a href="editroutine.php"><span>Editar rutina</span></a>
			</li>

			<li>
				<a href="viewroutine.php"><span>Ver rutina</span></a>
			</li>

		</ul>

	</li>

	<li id="adminprofile"><a href="more-userprofile.php"><i class="entypo-folder"></i><span>Perfil</span></a></li>

	<li><a href="logout.php"><i class="entypo-logout"></i><span>Cerrar sesión</span></a></li>

</ul>	
