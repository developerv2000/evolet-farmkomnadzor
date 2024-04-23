<!DOCTYPE html>
<html class="supervision-html" lang="{{ $appLocale }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Pharmacovigilance') }}</title>

    <style>
        .supervision-html body {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="supervision">
        <h3 class="main-title supervision__title">{{ __('app.title') }}</h3>

        {{-- Contacts --}}
        <div class="supervision__contacts">
            @switch($appLocale)
                @case('en')
                    <h4 class="supervision__contacts-title">{{ __('Contact number') }}:</h4>

                    <p class="supervision__contacts-item">
                        <a href="tel:+919315701305">+919315701305</a> <span>({{ __('for drug safety inquiries') }})</span>
                    </p>

                    <p class="supervision__contacts-item">
                        <a href="tel:+919311404005">+919311404005</a> <span>({{ __('for quality, sales & marekting related inquiries') }})</span>
                    </p>
                @break

                @case('ru')
                    <h4 class="supervision__contacts-title">{{ __('Contact number') }}:</h4>

                    <p class="supervision__contacts-item">
                        <a href="tel:+77771750099">+77771750099</a> <span>({{ __('for drug safety inquiries') }})</span>
                    </p>

                    <h4 class="supervision__contacts-title">{{ __('Contact E-mail') }}:</h4>

                    <p class="supervision__contacts-item">
                        <a href="mailto:drugsafety@evolet.co.uk">drugsafety@evolet.co.uk</a> <span>({{ __('for drug safety inquiries') }})</span>
                    </p>
                @break
            @endswitch
        </div>

        {{-- Form --}}
        <div class="supervision__form-wrapper">
            <h3 class="supervision__form-title">{{ __('Online submission') }}:</h3>
            <p class="supervision__form-notes">{!! __('app.form_notes') !!}</p>

            <form class="supervision__form" action="{{ route('report') }}" method="POST" onsubmit="window.parent.location.reload();">
                @csrf

                <div class="form-group">
                    <label class="label" for="patient-initial">{{ __('Patient initials') }} <span class="required">*</span></label>
                    <input type="text" id="patient-initial" name="patient_initial" required>
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-age">{{ __('Age (Years)') }}</label>
                    <input type="number" max="200" id="supervision-age" name="age" min="1">
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-weight">{{ __('Weight (Kgs)') }}</label>
                    <input type="number" id="supervision-weight" name="weight" min="1">
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-height">{{ __('Height (Cms)') }}</label>
                    <input type="number" id="supervision-height" name="height" min="1">
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-event">{{ __('Adverse event') }} <span class="required">*</span></label>
                    <input type="text" id="supervision-event" name="event" required>
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-drugs">{{ __('Suspect drugs') }} <span class="required">*</span></label>
                    <input type="text" id="supervision-drugs" name="drugs" required>
                </div>

                <div class="form-group">
                    <label class="label" for="reporter-name">{{ __('Name of the reporter') }} <span class="required">*</span></label>
                    <input type="text" id="reporter-name" name="reporter_name" required>
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-email">{{ __('Email ID of the reporter') }} <span class="required">*</span></label>
                    <input type="text" id="supervision-email" name="email" required>
                </div>

                <div class="form-group">
                    <label class="label" for="supervision-phone">{{ __('Telephone/Cell number of the reporter') }} <span class="required">*</span></label>
                    <input type="text" id="supervision-phone" name="phone" required>
                </div>

                <button class="button supervision__submit" type="submit">{{ __('Send') }}</button>
            </form>
        </div>

        <div class="supervision__text">
            <p>
                {{ __('Нажмите, чтобы загрузить') }}
                <a href="{{ asset('forms/' . $appLocale . '.docx') }}">{{ __('Adverse Event Reporting Form') }}</a>
                {{ __('for detailed reporting') }}.
            </p>

            <p>{{ __('app.after_submit_info') }}</p>

            <h4 class="supervision__confidence-title">{{ __('Confidentiality') }}</h4>
            <p>{{ __('app.confidence_block_1') }}</p>
            <p>{{ __('app.confidence_block_2') }}</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', (evt) => {
            resizeSupervisionIframeHeight();
        });

        window.parent.addEventListener('load', (evt) => {
            resizeSupervisionIframeHeight();
        });

        function resizeSupervisionIframeHeight() {
            document.querySelector('iframe').style.height = '800px';
        }
    </script>
</body>

</html>
