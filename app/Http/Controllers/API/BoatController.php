<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// request
use App\Http\Requests\CreateBoatRequest;
use App\Http\Requests\UpdateBoatRequest;

// use library here
use App\Helpers\ResponseFormatter;
use Exception;

// use model here
use App\Models\Boat;

class BoatController extends Controller
{
    public function create(CreateBoatRequest $request)
    {
        try {
            // Upload boat_photo
            if ($request->hasFile('boat_photo')) {
                $path_boat = $request->file('boat_photo')->store('public/boat');
            }
            // Upload license_document
            if ($request->hasFile('license_document')) {
                $path_document = $request->file('license_document')->store('public/document');
            }

            // Create boat
            $boat = Boat::create([
                'boat_code' => $request->boat_code,
                'boat_name' => $request->boat_name,
                'owner_name' => $request->owner_name,
                'owner_address' => $request->owner_address,
                'boat_size' => $request->boat_size,
                'captain' => $request->captain,
                'member_amount' => $request->member_amount,
                'boat_photo' => $path_boat,
                'license_number' => $request->license_number,
                'license_document' => $path_document,
            ]);

            if (!$boat) {
                throw new Exception('Boat not created');
            }

            return ResponseFormatter::success($boat, 'Boat created');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function update(UpdateBoatRequest $request, $id)
    {

        try {
            // Get boat
            $boat = Boat::find($id);

            // Check if boat exists
            if (!$boat) {
                throw new Exception('Employee not found');
            }

            // Upload boat_photo
            if ($request->hasFile('boat_photo')) {
                $path_boat = $request->file('boat_photo')->store('public/boat');
            }
            // Upload license_document
            if ($request->hasFile('license_document')) {
                $path_document = $request->file('license_document')->store('public/document');
            }

            // Update boat
            $boat->update([
                'boat_code' => $request->boat_code,
                'boat_name' => $request->boat_name,
                'owner_name' => $request->owner_name,
                'owner_address' => $request->owner_address,
                'boat_size' => $request->boat_size,
                'captain' => $request->captain,
                'member_amount' => $request->member_amount,
                'boat_photo' => isset($path_boat) ? $path_boat : $boat->boat_photo,
                'license_number' => $request->license_number,
                'license_document' => isset($path_document) ? $path_document : $boat->license_document,
            ]);

            return ResponseFormatter::success($boat, 'Boat updated');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Get boat
            $boat = Boat::find($id);

            // Check if employee exists
            if (!$boat) {
                throw new Exception('Employee not found');
            }

            // Delete employee
            $boat->delete();

            return ResponseFormatter::success('Boat deleted');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
