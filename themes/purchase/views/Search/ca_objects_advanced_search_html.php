<?php

include_once(__CA_LIB_DIR__."/ca/Search/ObjectSearch.php");
include_once(__CA_MODELS_DIR__."/ca_occurrences.php");
	
?>
<div class="container">
	<div class="row collection">
		<div class="col-sm-12">	
			<div class="container advSearch">
				<div class="row">
					{{{form}}}
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Major:<br/>
<!--							{{{ca_occurrences.occurrence_id%width=220px&height=40px&select=1&type=hidden}}} -->

<select id="ca_occurrences_occurrence_id" class="" value="" name="ca_occurrences.occurrence_id[]">
<option selected="1" value="">-</option>

    <optgroup label="Current">
    <?php
     $o_data = new Db();
        $qr_result = $o_data->query("  select ca_attribute_values.value_longtext1, ca_attributes.row_id, ca_attributes.attribute_id, ca_occurrence_labels.name, ca_occurrences.occurrence_id,ca_occurrences.idno from ca_occurrences left join ca_occurrence_labels on ca_occurrences.occurrence_id = ca_occurrence_labels.occurrence_id join ca_attributes on ca_occurrences.occurrence_id = ca_attributes.row_id left join ca_attribute_values on ca_attributes.attribute_id = ca_attribute_values.attribute_id where ca_attributes.element_id = 46 and  ca_attribute_values.value_longtext1 = 6473  order by ca_occurrence_labels.name");

 while($qr_result->nextRow()) {
         print '<option value="'.$qr_result->get('row_id').'">'.$qr_result->get('name').'</option>';
	                 }
			                 ?>
					     </optgroup>

    <optgroup label="Legacy">
    <?php
     $o_data = new Db();
        $qr_result = $o_data->query("  select ca_attribute_values.value_longtext1, ca_attributes.row_id, ca_attributes.attribute_id, ca_occurrence_labels.name, ca_occurrences.occurrence_id,ca_occurrences.idno from ca_occurrences left join ca_occurrence_labels on ca_occurrences.occurrence_id = ca_occurrence_labels.occurrence_id join ca_attributes on ca_occurrences.occurrence_id = ca_attributes.row_id left join ca_attribute_values on ca_attributes.attribute_id = ca_attribute_values.attribute_id where ca_attributes.element_id = 46 and  ca_attribute_values.value_longtext1 = 6474  order by ca_occurrence_labels.name");

 while($qr_result->nextRow()) {
         print '<option value="'.$qr_result->get('row_id').'">'.$qr_result->get('name').'</option>';
	                 }
			                 ?>
					     </optgroup>
					     </select>

<input type="hidden" value="CollectiveAccess id (from related occurrences)" name="ca_occurrences.occurrence_id_label">
</div>
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Project Type:<br/>
							{{{ca_objects.project_type%width=220px}}}  
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Reader:<br/>
							{{{ca_entities.preferred_labels.displayname/first_reader;second_reader;third_reader%width=220px&height=1}}}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Student:<br/>
							{{{ca_entities.preferred_labels.displayname/student%width=220px&height=1}}}
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Title:<br/>
							{{{ca_objects.preferred_labels.name%width=220px}}}
						</div>																									
						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Keyword:<br/>
							{{{_fulltext%width=220px&height=1}}}
							<br style="clear: both;"/>	
							<div class='searchButton'>{{{reset%label=Reset}}}</div>
							<div class='searchButton'>{{{submit%label=Search}}}</div>
						</div>					
<!--						<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
							Graduation Year <small>(<i>ie 2011-2013</i>)</small>:<br/>
							{{{ca_objects.graduation_year%width=220px}}}
-->
<div class="col-sm-6 col-md-6 col-lg-6 advSearchField">
                                                        Graduation Year:
<select id="ca_objects.graduation_year[]" class="" name="ca_objects.graduation_year">
<option selected="0" value="">-</option>
<?php
 $o_data = new Db();
   $qr_result = $o_data->query("select distinct(value_longtext1) from ca_attribute_values where element_id = 28  order by value_longtext1 ");

 while($qr_result->nextRow()) {
        print '<option value="'.$qr_result->get('value_longtext1').'">'.$qr_result->get('value_longtext1').'</option>';
	        }
		?>
		</select>

</div>

						

					{{{/form}}}
					<div class='clearfix'></div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!--end col-sm-8-->
	</div><!--end row-->
</div> <!--end container-->

