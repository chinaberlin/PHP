<?php

Trait D
{
    public function getName()
    {
        return 'D';
    }
}


Trait A
{
    public function getName()
    {
        return 'A';
    }
}

Trait B
{
    use A;
}


class C
{
    use D,A,B{
        A::getName insteadof D;
        D::getName as dGetName;
        A::getName as protected;
    }

//    public function getName(){
//        return 'c';
//    }
}

$c = new C;

echo $c->getName();