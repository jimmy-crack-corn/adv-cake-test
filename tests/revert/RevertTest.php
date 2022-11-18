<?php

namespace revert;

use helpers\RevertStringHelper;

class RevertTest extends \PHPUnit\Framework\TestCase {

    private RevertStringHelper $revertStringHelper;

    protected function setUp(): void {
        $this->revertStringHelper = RevertStringHelper::instance();
    }

    public function testRevertString() {
        $testData = [
            'Съешь еще этих мягких французских булок, да выпей чаю!',
            'И ты, Брут?',
            'А роза упала на лапу Азора',
            'Ночь, улица, фонарь, аптека',
            'Все будет так. Исхода нет.'
        ];
        $expected = [
            'Ьшеъс еще хитэ хикгям хиксзуцнарф колуб, ад йепыв юач!',
            'И ыт, Турб?',
            'А азор алапу ан упал Ароза',
            'Ьчон, ацилу, ьраноф, акетпа',
            'Есв тедуб кат. Адохси тен.'
        ];
        foreach ($testData as $index => $testItem) {
            $this->assertEquals($expected[$index], $this->revertStringHelper->revert($testItem));
        }
    }
}