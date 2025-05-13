 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
   body {
  background-color: #424565;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.wholeskull {
  position: absolute;
  justify-content: center;
  display: flex;
  top: 50px;
  animation: float 1s infinite;
}

.skull .top {
  background-color: #fff;
  position: relative;
  /*   justify-content:center; */
  /*   align-items:center; */
  display: flex;
  top: 50px;
  width: 250px;
  height: 200px;
  border-top-left-radius: 100px;
  border-top-right-radius: 100px;
  border-bottom-left-radius: 25px;
  border-bottom-right-radius: 25px;
}

.skull .cross {
  margin: auto;
  position: relative;
  width: 30px;
  bottom: 50px;
}

.skull .cross:before {
  content: " ";
  width: 10px;
  height: 50px;
  left: 10px;
  background-color: #424565;
  position: absolute;
  border-radius: 5px;
}

.skull .cross:after {
  content: " ";
  width: 30px;
  height: 10px;
  background-color: #424565;
  position: absolute;
  top: 25px;
  border-radius: 5px;
}

.skull .bottom {
  position: relative;
  height: 100px;
  top: 50px;
  width: 250px;
}

.skull .bottom .white {
  position: absolute;
  width: 250px;
  height: 50%;
  background-color: #fff;
  border: none;
}

.skull .bottom:before,
.skull .bottom:after {
  box-sizing: inherit;
  content: " ";
  background-color: #424565;
  width: 50px;
  height: 100px;
  display: inline-block;
  position: absolute;
  top: 00px;
  z-index: 1;
}

.skull .bottom:before {
  border-top-right-radius: 25px;
  left: 0;
}
.skull .bottom:after {
  border-top-left-radius: 25px;
  right: 0;
}

.eyes {
  position: relative;
}

.eyes:before,
.eyes:after {
  content: "";
  position: absolute;
  background-color: black;
  width: 70px;
  height: 70px;
  display: inline-block;
  border-radius: 50%;
  bottom: 75px;
}

.eyes:before {
  left: 50px;
}
.eyes:after {
  right: 50px;
}

.iris:before,
.iris:after {
  content: "";
  position: absolute;
  background-color: #424565;
  width: 50px;
  height: 50px;
  display: inline-block;
  border-radius: 50%;
  bottom: 90px;
  z-index: 1;
}

.iris:before {
  left: 60px;
}
.iris:after {
  right: 60px;
}

.eyeball:before,
.eyeball:after {
  content: "";
  position: absolute;
  background-color: #6c0000;
  width: 20px;
  height: 20px;
  display: inline-block;
  border-radius: 50%;
  bottom: 105px;
  z-index: 2;
}

.eyeball:before {
  left: 75px;
}
.eyeball:after {
  right: 75px;
}

.mouth {
  position: absolute;
  background-color: white;
  width: 220px;
  height: 25px;
  top: 380px;
  border-bottom-left-radius: 50px;
  border-bottom-right-radius: 50px;
  animation: laugh 0.3s infinite;
}

.mouth:before,
.mouth:after {
  box-sizing: inherit;
  content: " ";
  background-color: #fff;
  width: 25px;
  height: 100px;
  display: inline-block;
  position: absolute;
  bottom: 25px;
  z-index: 1;
}

.mouth:before {
  border-top-right-radius: 25px;
  border-top-left-radius: 25px;
  left: 0;
}
.mouth:after {
  border-top-right-radius: 25px;
  border-top-left-radius: 25px;
  right: 0;
}

.teeth {
  position: absolute;
  display: flex;
  left: 50px;
  bottom: 0;
}

.teeth > * {
  content: " ";
  height: 80px;
  width: 21.4285714286px;
}

.teeth > *:nth-child(even) {
  background-color: #424565;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.teeth > *:nth-child(odd) {
  background-color: white;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.shadow {
  position: absolute;
  width: 200px;
  height: 75px;
  top: 550px;
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
  z-index: -1;
  animation: breathe 1s infinite;
}

.horn:before,
.horn:after{
  content: '';
  position: absolute;
  width: 100px;
  height: 100px;
  top:100px;
  background-color: #fff;
}

.horn:before{
  left:-20px;
  border-radius: 13% 87% 61% 39% / 5% 69% 31% 95%;
}
.horn:after{
  right:-20px;
  border-radius: 87% 13% 39% 61% / 69% 5% 95% 31%;
}

@keyframes float {
  0%,
  100% {
    top: 50px;
  }
  50% {
    top: 100px;
  }
}

@keyframes laugh {
  0%,
  100% {
    top: 380px;
    width: 240px;
  }
  50% {
    top: 360px;
    width: 220px;
  }
}

@keyframes breathe {
  0%,
  100% {
    width: 175px;
  }
  50% {
    width: 200px;
  }
}

   </style>