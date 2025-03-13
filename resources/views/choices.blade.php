<div
    x-data="{
        select: undefined,
        search() {
            this.select.setChoices(
              [
                {
                  label: 'Group one',
{{--                  disabled: false,--}}
                  choices: [
                    { value: 'Child One', label: 'Searched Child One' },
                    { value: 'Child Two', label: 'Searched Child Two' },
                    { value: 'Child Three', label: 'Searched Child Three' }
                  ]
                },
                {
                  label: 'Group two',
{{--                  disabled: false,--}}
                  choices: [
                    { value: 'Child Four', label: 'Searched Child Four' },
                    { value: 'Child Five', label: 'Searched Child Five' },
                    { value: 'Child Six', label: 'Searched Child Six' }
                  ]
                }
              ],
              'value',
              'label',
              true,
         );
        }
    }"
    x-init="
        select = new Choices($refs.choices, {
            searchEnabled: false
        });
        select.setChoices(
          [
            {
              label: 'Group one',
              choices: [
                { value: 'Child One', label: 'Child One' },
                { value: 'Child Two', label: 'Child Two' },
                { value: 'Child Three', label: 'Child Three' }
              ]
            },
            {
              label: 'Group two',
              choices: [
                { value: 'Child Four', label: 'Child Four' },
                { value: 'Child Five', label: 'Child Five' },
                { value: 'Child Six', label: 'Child Six' }
              ]
            }
          ],
          'value',
          'label',
          false,
        );
    "
>
    <x-filament-forms::field-wrapper.label>Choices</x-filament-forms::field-wrapper.label>
    <x-filament-forms::field-wrapper.index>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <select x-ref="choices"></select>
    </x-filament-forms::field-wrapper.index>
    <x-filament::button x-on:click.prevent="search">Search</x-filament::button>
</div>
