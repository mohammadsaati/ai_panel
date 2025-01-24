<?php

namespace App\Http\Controllers;

use App\Http\Requests\Slider\CreateRequest;
use App\Models\Category;
use App\Models\Slider;

use App\Services\SliderService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct(public readonly SliderService $service)
    {
    }

    private const VIEW_FOLDER = 'admin.slider.';

    /**
     * Show all sliders
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $data['title'] = 'لیست اسلایدر ها';
        $data['sliders'] = Slider::query()->paginate(20);

        return view(self::VIEW_FOLDER . 'index', compact('data'));
    }

    /**
     * Show create slider page
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $data['title'] = 'ساخت اسلایدر';
        $data['categories'] = Category::all();

        return view(self::VIEW_FOLDER . 'create', compact('data'));
    }

    /**
     * Show slider edit page
     *
     * @param Slider $slider
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Slider $slider)
    {
        return view(self::VIEW_FOLDER . 'edit', compact('slider'));
    }

    /**
     * Create new Slider
     *
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create(data: $request->validationData());

        return redirect()->route('slider.index');
    }

    /**
     * delete given slider from service
     *
     * @param Slider $slider
     * @return JsonResponse
     */
    public function delete(Slider $slider): JsonResponse
    {
        return $this->service->delete(slider: $slider);
    }
}
