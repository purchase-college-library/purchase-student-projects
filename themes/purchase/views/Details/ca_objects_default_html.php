<?php
	$t_object = $this->getVar("item");
	$va_comments = $this->getVar("comments");
?>
<div class="row">
	<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgLeft">
			{{{previousLink}}}{{{resultsLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
	<div class='col-xs-10 col-sm-10 col-md-10 col-lg-10'>
		<div class="container"><div class="row">
			<div class='col-sm-6 col-md-6 col-lg-6'>
				{{{representationViewer}}}				

 {{{<ifdef code="ca_objects.idno"><p>Questions or comments about this Student Project? <a href='/index.php/Contact/Contact/objectForm/object_id/^ca_objects.idno'>Contact the Digital Collections Center.</a><br/></ifdef>}}}

</p>
			</div><!-- end col -->
			<div class='col-sm-6 col-md-6 col-lg-6'>
				<H2>{{{<ifdef code="ca_objects.preferred_labels">^ca_objects.preferred_labels<br/></ifdef>}}}</H2>
<?php
				print "<h6>".$t_object->get('ca_objects.project_type', array('convertCodesToDisplayText' => true, 'useSingular' => true))."</h6>";
?>				<HR>				
				
				
				
				{{{<ifdef code="ca_objects.abstract">
					<span ><H6>Abstract:</H6>^ca_objects.abstract</span>
				</ifdef>}}}
				
				{{{<ifdef code="ca_objects.page_number"><H6>Number of Pages:</H6>^ca_objects.page_number<br/></ifdef>}}}
				
				{{{<ifdef code="ca_objects.graduation_year"><H6>Graduation Year:</H6>^ca_objects.graduation_year<br/></ifdef>}}}
				{{{<ifdef code="ca_objects.graduation_semester"><H6>Graduation Semester:</H6>^ca_objects.graduation_semester<br/></ifdef>}}}
				
				{{{<ifcount code="ca_entities" min="1" max="1"><H6>Student</H6></ifcount>}}}
				{{{<ifcount code="ca_entities" min="2"><H6>Students</H6></ifcount>}}}
				{{{<unit relativeTo="ca_entities" delimiter="<br/>" restrictToRelationshipTypes="student"><l>^ca_entities.preferred_labels.displayname</l></unit><br/>}}}
<?php
				if ($va_first_reader = $t_object->get('ca_entities.preferred_labels', array('restrictToRelationshipTypes' => array('first_reader'), 'delimiter' => ', ', 'returnAsLink' => true))) {
					print "<div class='unit'><h6>First Reader</h6>".$va_first_reader."</div>"; 
				}
				if ($va_second_reader = $t_object->get('ca_entities.preferred_labels', array('restrictToRelationshipTypes' => array('second_reader'), 'delimiter' => ', ', 'returnAsLink' => true))) {
					print "<div class='unit'><h6>Second Reader</h6>".$va_second_reader."</div>"; 
				}
				if ($va_third_reader = $t_object->get('ca_entities.preferred_labels', array('restrictToRelationshipTypes' => array('third_reader'), 'delimiter' => ', ', 'returnAsLink' => true))) {
					print "<div class='unit'><h6>Third Reader</h6>".$va_third_reader."</div>"; 
				}								
?>								
				
				{{{<ifcount code="ca_occurrences" min="1" max="1"><H6>Major</H6></ifcount>}}}
				{{{<ifcount code="ca_occurrences" min="2"><H6>Majors</H6></ifcount>}}}
				{{{<unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l></unit><br/><br/>}}}
				
			</div><!-- end col -->
		</div><!-- end row --></div><!-- end container -->
	</div><!-- end col -->
	<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'>
		<div class="detailNavBgRight">
			{{{nextLink}}}
		</div><!-- end detailNavBgLeft -->
	</div><!-- end col -->
</div><!-- end row -->



<script type='text/javascript'>
	jQuery(document).ready(function() {
		$('.trimText').readmore({
		  speed: 75,
		  maxHeight: 150
		});
	});
</script>