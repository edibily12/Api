<?php

use App\Models\AttenndanceRecord;
use Carbon\Carbon;
use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {

        return [
            'attendances' => AttenndanceRecord::with('teacher')->get()
        ];
    }
}; ?>

<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Teacher Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Sign In
                </th>
                <th scope="col" class="px-6 py-3">
                    Sign Out
                </th>
            </tr>
            </thead>
            <tbody>
            @if(count($attendances))
                @php $sno=1 @endphp
                @foreach($attendances as $attendance)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $sno++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $attendance->teacher->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->teacher->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->teacher->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->sign_in ?
                                Carbon::createFromFormat('Y-m-d H:i:s', $attendance->sign_in)->format('d/m/y H:i:s') : "N/A"
                            }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $attendance->sign_out ?
                                Carbon::createFromFormat('Y-m-d H:i:s', $attendance->sign_out)->format('d/m/y H:i:s')  : "N/A"
                            }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4" colspan="5">
                        <p>No data found</p>
                    </td>
                </tr>

            @endif


            </tbody>
        </table>
    </div>
</div>
