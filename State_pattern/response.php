<?php 
interface Mood {
    public function handle();
}

class Context {
    private Mood $mood;

    public function setMood(Mood $mood) {
        $this->mood = $mood;
    }

    public function requestPrint() {
        $this->mood->handle();
    }
}

class SadMood implements Mood {
    public function handle() {
        echo "Sad";
    }
}

class AngryMood implements Mood {
    public function handle() {
        echo "Angry";
    }
}

class ShockedMood implements Mood {
    public function handle() {
        echo "Shocked";
    }
}

class HappyMood implements Mood {
    public function handle() {
        echo "Happy";
    }
}

class CryingMood implements Mood {
    public function handle() {
        echo "Crying";
    }
}

class SleepyMood implements Mood {
    public function handle() {
        echo "Sleepy";
    }
}

class HungryMood implements Mood {
    public function handle() {
        echo "Hungry";
    }
}

class CoolMood implements Mood {
    public function handle() {
        echo "Cool";
    }
}

class SickMood implements Mood {
    public function handle() {
        echo "Sick";
    }
}

class DefaultMood implements Mood {
    public function handle() {
        echo "Mood";
    }
}

if (isset($_POST['mood'])) {
    $MoodResponse = new Context();

    switch ($_POST['mood']) {
        case "HappyMood":
            $MoodResponse->setMood(new HappyMood());
            break;
        case "ShockedMood":
            $MoodResponse->setMood(new ShockedMood());
            break;
        case "SadMood":
            $MoodResponse->setMood(new SadMood());
            break;
        case "AngryMood":
            $MoodResponse->setMood(new AngryMood());
            break;
        case "CryingMood":
            $MoodResponse->setMood(new CryingMood());
            break;
        case "SleepyMood":
            $MoodResponse->setMood(new SleepyMood());
            break;
        case "HungryMood":
            $MoodResponse->setMood(new HungryMood());
            break;
        case "SickMood":
            $MoodResponse->setMood(new SickMood());
            break;
        case "CoolMood":
            $MoodResponse->setMood(new CoolMood());
            break;
        default:
            $MoodResponse->setMood(new DefaultMood());
            break;

    }

    $MoodResponse->requestPrint();
}

?>