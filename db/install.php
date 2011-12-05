<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_plagiarism_turnitin_install() {
    global $DB;
    if (!$DB->record_exists('user_info_field', array('shortname'=>'turnitinteachercoursecache'))) {
        //first insert category
        $newcat = new stdClass();
        $newcat->name = 'plagiarism_turnitin';
        $newcat->sortorder = 999;
        $catid = $DB->insert_record('user_info_category', $newcat);
        //now insert field
        $newfield = new stdClass();
        $newfield->shortname = 'turnitinteachercoursecache';
        $newfield->name = get_string('userprofileteachercache','plagiarism_turnitin');
        $newfield->description = get_string('userprofileteachercache_desc','plagiarism_turnitin');
        $newfield->datatype = 'text';
        $newfield->descriptionformat = 1;
        $newfield->categoryid = $catid;
        $newfield->sortorder = 1;
        $newfield->required = 0;
        $newfield->locked = 1;
        $newfield->visible = 0;
        $newfield->forceunique = 0;
        $newfield->signup = 0;
        $newfield->param1 = 30;
        $newfield->param2 = 5000;

        $DB->insert_record('user_info_field', $newfield);
    }
}
