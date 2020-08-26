<?php

namespace App\Services;


use App\DomainParams\Candidates;
use App\Models\Interview;
use GuzzleHttp\Psr7\Request;

class InterviewService
{

    public function createInterview()
    {

    }

    public function getListCandidates()
    {

    }

    public function list($year, $month)
    {
        $date = $year . '-' . $month;

        $interview = Interview::with('vacancy')
            ->with('candidate')
            ->where('date_interview', 'LIKE', "%{$date}%")
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $interview;
    }

    public function deleteInterview($id)
    {
        return $interview = Interview::destroy($id);
    }

    public function addInterview()
    {
        $year = date('Y');
        $month = date('m');
        $day = date('d');

        if(!empty($_GET['year'])) {
            $year = $_GET['year'];
        }
        if(!empty($_GET['month'])) {
            $month = $_GET['month'];
        }
        if(!empty($_GET['day'])) {
            $day = $_GET['day'];
        }

        if(!empty($_GET['vacancyId'])) {
            $vacancy_id = $_GET['vacancyId'];
        }

        if(!empty($_GET['candidateId'])) {
            $candidate_id = $_GET['candidateId'];
        }

        $date = $year . '-' . $month . '-' . $day;

        $interview = new Interview();
        $interview->vacancy_id = $vacancy_id;
        $interview->candidate_id = $candidate_id;
        $interview->interviewer_first_name = $_GET['interview_first_name'];
        $interview->interviewer_last_name = $_GET['interview_last_name'];
        $interview->time_start = $_GET['time_start'];
        $interview->time_end = $_GET['time_end'];
        $interview->interviewer_email = $_GET['interview_email'];
        $interview->date_interview = $date;
        $interview->save();
    }

}