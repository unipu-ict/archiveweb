<!-- Autor: Sebastijan Legović, 03.03.2017. -->
<li class="treeview">
	<a href="#">
		<i class="fa fa-archive"></i> <span>Preuzimanje</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Predavatelji", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="predavatelji")?"active":"not-active"?>">
		<a href="<?php echo base_url("predavatelji"); ?>"><i class="fa fa-circle-o"></i> <span>Predavatelji</span></a></li>
<?php }?>
<?php if(CheckPermission("Stvaratelji", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="stvaratelji")?"active":"not-active"?>">
		<a href="<?php echo base_url("stvaratelji"); ?>"><i class="fa fa-circle-o"></i> <span>Stvaratelji</span></a></li>
<?php }?>
<?php if(CheckPermission("Akvizicije", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="akvizicije")?"active":"not-active"?>">
		<a href="<?php echo base_url("akvizicije"); ?>"><i class="fa fa-circle-o"></i> <span>Knjiga akvizicija</span></a>
	</li><?php }?>
<?php if(CheckPermission("Depoziti", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="depoziti")?"active":"not-active"?>">
		<a href="<?php echo base_url("depoziti"); ?>"><i class="fa fa-circle-o"></i> <span>Knjiga depozita</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-tasks "></i> <span>Dostupnost</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Opci inventar", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="opci_inventar")?"active":"not-active"?>">
		<a href="<?php echo base_url("opci_inventar"); ?>"><i class="fa fa-circle-o"></i> <span>Opći inventar</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-plus-square"></i> <span>Dugoročna zaštita</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Knjiga snimljenoga gradiva", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="knjiga_snimljenoga_gradiva")?"active":"not-active"?>">
		<a href="<?php echo base_url("knjiga_snimljenoga_gradiva"); ?>"><i class="fa fa-circle-o"></i> <span>Knjiga snimljenoga gradiva</span></a>
	</li><?php }?>
<?php if(CheckPermission("Knjiga dopunskih preslika", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="knjiga_dopunskih_preslika")?"active":"not-active"?>">
		<a href="<?php echo base_url("knjiga_dopunskih_preslika"); ?>"><i class="fa fa-circle-o"></i> <span>Knjiga dopunskih preslika</span></a>
	</li><?php }?>
<?php if(CheckPermission("Knjiga restauriranoga gradiva", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="knjiga_restauriranoga_gradiva")?"active":"not-active"?>">
		<a href="<?php echo base_url("knjiga_restauriranoga_gradiva"); ?>"><i class="fa fa-circle-o"></i> <span>Knjiga restauriranoga gradiva</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="glyphicon glyphicon-fullscreen"></i> <span>Gradivo u nastajanju</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Evidencija stvaratelja", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="evidencija_stvaratelja")?"active":"not-active"?>">
		<a href="<?php echo base_url("evidencija_stvaratelja"); ?>"><i class="fa fa-circle-o"></i> <span>Evidencija stvaratelja</span></a>
	</li><?php }?>
<?php if(CheckPermission("Evidencija imatelja", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="evidencija_imatelja")?"active":"not-active"?>">
		<a href="<?php echo base_url("evidencija_imatelja"); ?>"><i class="fa fa-circle-o"></i> <span>Evidencija imatelja</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-book"></i> <span>Čitaonica</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Evidencija korisnika", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="evidencija_korisnika")?"active":"not-active"?>">
		<a href="<?php echo base_url("evidencija_korisnika"); ?>"><i class="fa fa-circle-o"></i> <span>Evidencija korisnika</span></a>
	</li><?php }?>
<?php if(CheckPermission("Prijavnice", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="prijavnice")?"active":"not-active"?>">
		<a href="<?php echo base_url("prijavnice"); ?>"><i class="fa fa-circle-o"></i> <span>Prijavnice</span></a>
	</li><?php }?>
<?php if(CheckPermission("Zahtjevnice", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="zahtjevnice")?"active":"not-active"?>">
		<a href="<?php echo base_url("zahtjevnice"); ?>"><i class="fa fa-circle-o"></i> <span>Zahtjevnice</span></a>
	</li><?php }?>
<?php if(CheckPermission("Dnevnik citaonice", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="dnevnik_citaonice")?"active":"not-active"?>">
		<a href="<?php echo base_url("dnevnik_citaonice"); ?>"><i class="fa fa-circle-o"></i> <span>Dnevnik čitaonice</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-database"></i> <span>Šifrarnici</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Mjesta", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="mjesta")?"active":"not-active"?>">
		<a href="<?php echo base_url("mjesta"); ?>"><i class="fa fa-circle-o"></i> <span>Mjesta</span></a>
	</li><?php }?>
</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-pie-chart"></i> <span>Statistika</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
<?php if(CheckPermission("Opci inventar", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="evidencija_korisnika/charts")?"active":"not-active"?>">
		<a href="<?php echo base_url("evidencija_korisnika/charts"); ?>"><i class="fa fa-circle-o"></i> <span>Evidencija korisnika</span></a>
	</li><?php }?>
<?php if(CheckPermission("Opci inventar", "all_read,own_read")){ ?>
	<li class="<?=($this->router->class==="zahtjevnice/charts")?"active":"not-active"?>">
		<a href="<?php echo base_url("zahtjevnice/charts"); ?>"><i class="fa fa-circle-o"></i> <span>Evidencija korištenja</span></a>
	</li><?php }?>
