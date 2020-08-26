<?php

namespace App\Constants;

class CandidatesParams
{
    const CANDIDATE_PHOTO_SAVE_PATH       = 'candidate/photo/save';
    const CANDIDATE_TEMP_FILE_PATH        = '/uploads/tempFileCandidate/';
    const CANDIDATE_PHOTO_FILE_PATH       = '/uploads/photoCandidate/';
    const CANDIDATE_FILE_PATH             = '/uploads/filesCandidate/';
    const CANDIDATE_ROUT_UPLOAD_PHOTO     = 'uploadPhotoCandidate';
    const UPLOAD_PHOTO_URL                = '/candidate/photo/save';
    const CANDIDATE_ROUT_LIST             = 'candidate/list';

    const CANDIDATE_FILE_PHOTO            = 1;
    const CANDIDATE_RESUME_FILE           = 2;
    const CANDIDATE_TEST_TASK_FILE        = 3;
    const CANDIDATE_ANOTHER_FILE          = 4;

    const CITY_SEARCH_AUTOCOMPLETE        = '/vacancy/search/city';
    const CANDIDATE_SEARCH_AUTOCOMPLETE   = '/candidate/search';
    const CANDIDATE_TYPE_SEARCH_AUTOCOMPLETE = '/vacancy/search/candidate/types';
    const DEFAULT_COUNT_PAGINATION      = 3;
}