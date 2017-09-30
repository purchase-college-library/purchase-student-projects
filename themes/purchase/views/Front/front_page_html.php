<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * @package CollectiveAccess
 * @subpackage Core
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
		#print $this->render("Front/featured_set_slideshow_html.php");
?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h2>Purchase College, SUNY Student Projects digital repository</h2>
			<div>
				Welcome to the Purchase College, SUNY Student Projects digital repository. Browse and search the culminating scholarly and creative experiences of Purchase College graduate and undergraduate students including senior projects, capstone papers, and master’s theses. Projects from all Boards of Study (majors) from the <a href='http://www.purchase.edu/Departments/AcademicPrograms/las/' target='_blank'>School of Liberal Arts and Sciences</a>, all Boards of Study within the <a href='http://www.purchase.edu/Departments/AcademicPrograms/Arts/ArtDesign/' target='_blank'>School of the Art+Design</a>, and the <a href='http://www.purchase.edu/Departments/AcademicPrograms/ce/' target='_blank'>School of Liberal Studies & Continuing Education</a> are represented in the digital repository. Art History and Art+Design master’s theses are also included in the digital repository. Presently, the digital repository includes projects from 2012 to the present. The Library is currently digitizing and processing projects completed prior to 2012 to be added to the repository. To learn more about this process, please see the About page. To request a specific project that you cannot find in the digital repository, please contact us at <a href='mailto:lib.digitalcollections@purchase.edu'>lib.digitalcollections@purchase.edu</a>.
			</div>
		</div><!--end col-sm-8-->
		<div class="col-sm-6">
		<div class='searchDiv'>
<?php
		print "<h2>Find & Discover</h2>";  
		
		caSetAdvancedSearchFormInView($this, 'objects', "Search/ca_objects_advanced_search_html.php", array('controller' => 'Search', 'request' => $this->request));
		print $this->render("Search/ca_objects_advanced_search_html.php");
?>
		</div>
		</div> <!--end col-sm-4-->	
	</div><!-- end row -->
</div> <!--end container-->