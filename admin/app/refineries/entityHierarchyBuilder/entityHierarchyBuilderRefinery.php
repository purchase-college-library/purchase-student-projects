<?php
/* ----------------------------------------------------------------------
 * entityHierarchyBuilderRefinery.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2016 Whirl-i-Gig
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
 * ----------------------------------------------------------------------
 */
 	require_once(__CA_LIB_DIR__.'/ca/Import/BaseRefinery.php');
 	require_once(__CA_LIB_DIR__.'/ca/Utils/DataMigrationUtils.php');
	require_once(__CA_LIB_DIR__.'/core/Parsers/ExpressionParser.php');
	require_once(__CA_APP_DIR__.'/helpers/importHelpers.php');
 
	class entityHierarchyBuilderRefinery extends BaseRefinery {
		# -------------------------------------------------------
		public function __construct() {
			$this->ops_name = 'entityHierarchyBuilder';
			$this->ops_title = _t('Entity hierarchy builder');
			$this->ops_description = _t('Builds an entity hierarchy.');
			
			$this->opb_returns_multiple_values = true;
			
			parent::__construct();
		}
		# -------------------------------------------------------
		/**
		 * Override checkStatus() to return true
		 */
		public function checkStatus() {
			return array(
				'description' => $this->getDescription(),
				'errors' => array(),
				'warnings' => array(),
				'available' => true,
			);
		}
		# -------------------------------------------------------
		/**
		 *
		 */
		public function refine(&$pa_destination_data, $pa_group, $pa_item, $pa_source_data, $pa_options=null) {
			$o_log = (isset($pa_options['log']) && is_object($pa_options['log'])) ? $pa_options['log'] : null;
			
			$t_mapping = caGetOption('mapping', $pa_options, null);
			if ($t_mapping) {
				$o_dm = Datamodel::load();
				if ($t_mapping->get('table_num') != $o_dm->getTableNum('ca_entities')) { 
					if ($o_log) {
						$o_log->logError(_t("entityHierarchyBuilder refinery may only be used in imports to ca_entities"));
					}
					return null; 
				}
			}
			
			$va_group_dest = explode(".", $pa_group['destination']);
			$vs_terminal = array_pop($va_group_dest);
			$pm_value = $pa_source_data[$pa_item['source']];
			
			
			$vn_parent_id = null;
			
			// Set entity parents
			if ($va_parents = $pa_item['settings']['entityHierarchyBuilder_parents']) {
				$vn_parent_id = caProcessRefineryParents('entityHierarchyBuilder', 'ca_entities', $va_parents, $pa_source_data, $pa_item, null, $pa_options);
			}
			
			return $vn_parent_id;
		}
		# -------------------------------------------------------	
		/**
		 * entityHierarchyBuilder returns multiple values
		 *
		 * @return bool
		 */
		public function returnsMultipleValues() {
			return false;
		}
		# -------------------------------------------------------
	}
	
	BaseRefinery::$s_refinery_settings['entityHierarchyBuilder'] = array(	
		'entityHierarchyBuilder_matchOn' => array(
			'formatType' => FT_TEXT,
			'displayType' => DT_SELECT,
			'width' => 10, 'height' => 1,
			'takesLocale' => false,
			'default' => '',
			'label' => _t('Match on'),
			'description' => _t('List indicating sequence of checks for an existing record; values of array can be "preferred_labels" (or "label"), "nonpreferred_labels", "idno" or a metadata element code. Ex. array("idno", "label") will first try to match on idno and then label if the first match fails')
		),
		'entityHierarchyBuilder_parents' => array(
			'formatType' => FT_TEXT,
			'displayType' => DT_SELECT,
			'width' => 10, 'height' => 1,
			'takesLocale' => false,
			'default' => '',
			'label' => _t('Parents'),
			'description' => _t('entity parents to create')
		)
	);