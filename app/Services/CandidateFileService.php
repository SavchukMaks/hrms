<?php

namespace App\Services;

use App\DomainParams\Candidates;
use App\Models\Candidate;
use App\Models\CandidateFile;
use Illuminate\Http\Request;

class CandidateFileService
{

    public function saveFiles(Candidate $candidate)
    {
        $arrFiles = $this->getFilesCandidate($candidate);

        foreach ($arrFiles as $fileData) {

            $this->createCandidateFile($candidate, $fileData);

            $this->savePhoto($fileData);

        }

        return $this;

    }

    protected function savePhoto($fileData)
    {
        if (session()->has('photo')){
            $this->moveFilePhotoCandidate($fileData);
        }

        return $this;
    }

    private function createCandidateFile(Candidate $candidate, array $fileData)
    {
        $candidateFile = new CandidateFile();
        $candidateFile->fill(array_merge($fileData, ['candidate_id' => $candidate->id]));
        $candidateFile->save();

        if (!session()->has('photo')){
            if ( !is_dir( $dirFilesCandidate = public_path().Candidates::CANDIDATE_FILE_PATH )){
                mkdir( $dirFilesCandidate );
            }
            $dirPath = public_path() . $fileData['file_dir'];
            $isDir = is_dir($dirPath);
            if(!$isDir){
                mkdir($dirPath);
            }
            $filePath = public_path() . $fileData['file_path'];
            $fileContent = file($fileData['file_content']);
            file_put_contents($filePath, $fileContent);
        }

        return $candidateFile;

    }

    private function moveFilePhotoCandidate($fileData)
    {
        $fileFrom = public_path() . Candidates::CANDIDATE_TEMP_FILE_PATH . $fileData['file_name'];
        $fileTo = public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . $fileData['id'] . '/' . $fileData['file_name'];

        mkdir(public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . $fileData['id']);
        copy($fileFrom, $fileTo);

        $isFile = file_exists($fileTo);

        if ($isFile){
            unlink($fileFrom);
            if($fileData['file_type'] == Candidates::CANDIDATE_FILE_PHOTO){
                session()->forget('photo');
            }
        }

        return $this;

    }

    private function getFilesCandidate(Candidate $candidate)
    {
        $data = array();

        $data = $this->getPhoto($data, $candidate);

        $data = $this->getCandidateResume($data, $candidate);

        $data = $this->getCandidateTestTask($data, $candidate);

        return $data;

    }

    protected function getPhoto(array $data, Candidate $candidate)
    {
        if (session()->has('photo')){
            $countElem = count($data);
            $arr = explode('/', session('photo'));
            $data[$countElem]['id'] = $candidate->id;
            $data[$countElem]['file_name'] = $arr[3];
            $data[$countElem]['file_type'] = Candidates::CANDIDATE_FILE_PHOTO;
            $data[$countElem]['file_url'] = env('APP_URL') . public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . $arr[3];
            $data[$countElem]['file_path'] = Candidates::CANDIDATE_PHOTO_FILE_PATH . $candidate->id . '/' . $arr[3];
            $data[$countElem]['file_dir'] = Candidates::CANDIDATE_PHOTO_FILE_PATH . $candidate->id;
            $data[$countElem]['file_content'] = null;

            $countElem++;
        }

        return $data;
    }

    protected function getCandidateResume(array $data, Candidate $candidate)
    {
        if(request()->hasFile('fileCandidateResume')){
            $arrResume = request()->file('fileCandidateResume');
            $countElem = count($data);
            foreach ($arrResume as $resume){
                $data[$countElem]['id'] = $candidate->id;
                $data[$countElem]['file_name'] = $resume->getClientOriginalName();
                $data[$countElem]['file_type'] = Candidates::CANDIDATE_RESUME_FILE;
                $data[$countElem]['file_url'] = env('APP_URL') . public_path() . Candidates::CANDIDATE_FILE_PATH . $resume->getClientOriginalName();
                $data[$countElem]['file_path'] = Candidates::CANDIDATE_FILE_PATH . $candidate->id . '/' . $resume->getClientOriginalName();
                $data[$countElem]['file_dir'] = Candidates::CANDIDATE_FILE_PATH . $candidate->id;
                $data[$countElem]['file_content'] = $resume;
                $countElem++;
            }
        }

        return $data;
    }

    protected function getCandidateTestTask(array $data, Candidate $candidate)
    {
        if(request()->hasFile('fileCandidateTestTask')){
            $arrTestTask = request()->file('fileCandidateTestTask');
            $countElem = count($data);
            foreach ($arrTestTask as $testTask){
                $data[$countElem]['id'] = $candidate->id;
                $data[$countElem]['file_name'] = $testTask->getClientOriginalName();
                $data[$countElem]['file_type'] = Candidates::CANDIDATE_TEST_TASK_FILE;
                $data[$countElem]['file_url'] = env('APP_URL') . public_path() . Candidates::CANDIDATE_FILE_PATH . $testTask->getClientOriginalName();
                $data[$countElem]['file_path'] = Candidates::CANDIDATE_FILE_PATH . $candidate->id . '/' . $testTask->getClientOriginalName();
                $data[$countElem]['file_dir'] = Candidates::CANDIDATE_FILE_PATH . $candidate->id;
                $data[$countElem]['file_content'] = $testTask;
                $countElem++;
            }
        }

        return $data;
    }

    public function deletePhoto()
    {
        $filePath = public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . \request()->input('id') . '/' . \request()->input('fileName');
        $dirPath = public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . \request()->input('id');
        if (file_exists($filePath)) unlink($filePath);

        return $this;
    }

    public function deleteFile($id, $file_type)
    {
        $candidateFile = CandidateFile::where('candidate_id', $id)
            ->where('file_type', $file_type);
        $candidateFile->delete();

        return $candidateFile;
    }

    public function updatePhoto(Request $request)
    {
        $filePath ='';
        if($request->hasFile('tempFile')) {
            $file = $request->file('tempFile');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . $request['id'] . '/', $fileName);
            $filePath = Candidates::CANDIDATE_PHOTO_FILE_PATH . $request['id'] . '/' . $fileName;
        }

        return $filePath;
    }

    public function createFile(Request $request, $type_file)
    {
        $data = array();
        if ($type_file == Candidates::CANDIDATE_FILE_PHOTO){
            $data = $this->getDataUpdatePhoto($request);
        }

        $candidateFile = new CandidateFile();
        $candidateFile->fill($data);
        $candidateFile->save();

        return $this;
    }

    private function getDataUpdatePhoto(Request $request)
    {
        $data['candidate_id'] = $request['id'];
        $data['file_name'] = $request->file('tempFile')->getClientOriginalName();
        $data['file_type'] = Candidates::CANDIDATE_FILE_PHOTO;
        $data['file_url'] = env('APP_URL') . public_path() . Candidates::CANDIDATE_PHOTO_FILE_PATH . $data['file_name'];
        $data['file_path'] = Candidates::CANDIDATE_PHOTO_FILE_PATH . $request['id'] . '/' . $data['file_name'];

        return $data;
    }

    public function updateFile(Request $request, string $column)
    {
        if(isset($request['oldFileName']) && $request['oldFileName'] != null){
            $this->deleteFileCandidate($request['id'], $column, $request['oldFileName']);
        }
        if(isset($request['fileName']) && $request['fileName'] != null) {
            $this->createFileCandidate($request['id'], $column, $request['fileName']);
        }

        return $this;
    }

    public function deleteFileCandidate(int $id, string $column, string $val)
    {
        CandidateFile::where('candidate_id', $id)
            ->where($column, $val)->delete();

        $file = public_path() . Candidates::CANDIDATE_FILE_PATH . $id . '/' .$val;
        $isFile = file_exists($file);
        if ($isFile){
            unlink($file);
        }

        return $this;
    }

    public function createFileCandidate(int $id, string $column, string $val)
    {
        $pathFile = public_path() . Candidates::CANDIDATE_FILE_PATH . $id;
        if(!is_dir($pathFile)){
            mkdir($pathFile);
        }

        if(request()->hasFile('tempFile')) {
            file_put_contents($pathFile . '/' . $val, file(request()->file('tempFile')));
        }

        $data = $this->getDataUpdateFile();
        $candidateFile = new CandidateFile();
        $candidateFile->fill($data);
        $candidateFile->save();

        return $this;
    }

    private function getDataUpdateFile()
    {
        $fileName = request()->file('tempFile')->getClientOriginalName();
        $data['candidate_id'] = request('id');
        $data['file_name'] = $fileName;
        if(request('inputId') == Candidates::INPUT_RESUME){
            $data['file_type'] = Candidates::CANDIDATE_RESUME_FILE;
        }elseif (request('inputId') == Candidates::INPUT_TEST_TASK){
            $data['file_type'] = Candidates::CANDIDATE_TEST_TASK_FILE;
        }else{
            $data['file_type'] = Candidates::CANDIDATE_ANOTHER_FILE;
        }
        $data['file_url'] = env('APP_URL') . public_path() . Candidates::CANDIDATE_FILE_PATH . $fileName;
        $data['file_path'] = Candidates::CANDIDATE_FILE_PATH . request('id') . '/' . $fileName;

        return $data;
    }

}