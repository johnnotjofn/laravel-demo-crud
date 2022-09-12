<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;

class UsersImport implements
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
//    ShouldQueue,
    WithBatchInserts,
    WithChunkReading
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;

//    /**
//     * For single models, we use model() methods and implement ToModel
//     *
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//    public function model(array $row)
//    {
//        return new User([
//            //
//            'name' => $row['name'],
//            'email' => $row['email'],
//            'password' => Hash::make($row['password']),
//        ]);
//    }

    /**
     * For relations table, we use collection instead and implement ToCollection
     *
     * @param Collection $collection
     * @return void
     * @throws ValidationException
     */
    public function collection(Collection $collection): void
    {
//        dd($collection);
        $validator = Validator::make($collection->toArray(), $this->rules())->validate();
        foreach ($collection as $row) {
//            dd($validator);
            if (!$validator) {
                dd('Error');
            } else {
                $user = User::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'password' => Hash::make($row['password'])
                ]);

                $user->country()->create([
                    'country' => $row['country']
                ]);
            }
        }
    }

//    public function onError(\Throwable $e)
//    {
//
//    }

    public function rules(): array
    {
        // TODO: Implement rules() methods
        return [
            '*.email' => ['email', 'unique:users,email']
        ];
    }


    public function batchSize(): int
    {
        // TODO: Implement batchSize() method.
        return 1000;
    }

    public function chunkSize(): int
    {
        // TODO: Implement chunkSize() method.
        return 1000;
    }

//    public static function afterImport(AfterImport $event)
//    {
//
//    }

//    public function onFailure(Failure ...$failures)
//    {
//        // TODO: Implement onFailure() method.
//    }
}
