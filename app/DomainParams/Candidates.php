<?php

namespace App\DomainParams;

class Candidates
{
    const CANDIDATE_PHOTO_SAVE_PATH       = 'candidate/photo/save';
    const CANDIDATE_TEMP_FILE_PATH        = '/uploads/tempFileCandidate/';
    const CANDIDATE_PHOTO_FILE_PATH       = '/uploads/photoCandidate/';
    const CANDIDATE_FILE_PATH             = '/uploads/filesCandidate/';
    const CANDIDATE_ROUT_UPLOAD_PHOTO     = 'uploadPhotoCandidate';
    const UPLOAD_PHOTO_URL                = '/candidate/photo/save';
    const DELETE_PHOTO_URL                = '/candidate/photo/edit';
    const UPLOAD_UPDATE_PHOTO_URL         = '/candidate/photo/update';
    const CANDIDATE_ROUT_LIST             = 'candidate/list';
    const CANDIDATE_ROUT_ADD              = 'candidate/add';
    const CANDIDATE_UPDATE                = '/candidate/update';
    const CANDIDATE_UPDATE_LOCATION       = '/candidate/update/location';
    const CANDIDATE_EDIT_LINK             = '/candidate/edit/link';
    const CANDIDATE_UPDATE_SKILLS         = '/candidate/update/skills';
    const CANDIDATE_DELETE_SKILLS         = '/candidate/delete/skills';
    const CANDIDATE_EDIT_FILE             = '/candidate/edit/file';
    const CANDIDATE_DELETE_FILE           = '/candidate/delete/file';
    const CANDIDATE_IMG_FILE_PATH         = '/img/uploads/candidates/';
    const CLIENT_ROLE                     = 'Client';

    const CANDIDATE_FILE_PHOTO            = 1;
    const CANDIDATE_RESUME_FILE           = 2;
    const CANDIDATE_TEST_TASK_FILE        = 3;
    const CANDIDATE_ANOTHER_FILE          = 4;

    const CITY_SEARCH_AUTOCOMPLETE        = '/vacancy/search/city';
    const CANDIDATE_SEARCH_AUTOCOMPLETE   = '/candidate/search';
    const CANDIDATE_TYPE_SEARCH_AUTOCOMPLETE = '/vacancy/search/candidate/types';
    const DEFAULT_COUNT_PAGINATION      = 10;

    const CANDIDATE_UPDATE_NAME         = 'candidate-name';

    const INPUT_TEST_TASK               = 'inputTest';
    const INPUT_RESUME                  = 'inputResume';

    const COLUMN_FILE_NAME              = 'file_name';
}