class plan
{
    constructor(name="",content ="") {
        this.name = name;
        this.content = content;
    }

    createPlan()
    {
        const li = document.createElement("li");
        li.classList.add("list-group-item");
        li.classList.add("d-flex");
        li.classList.add("justify-content-between");
        li.classList.add("align-items-center");
        li.innerHTML = `${this.name} at ${this.content}`;
        return(li);
    }
}

class plans
{
    plans = new Array();
    ul = document.querySelector("#plans");
    constructor()
    {
        this.showPlans();
    }
    showPlans()
    {
        this.ul.innerHTML ="";
        this.plans.forEach((p) =>
        {
            const  newPlan = p.createPlan();
            const i = document.createElement("i");
            i.classList.add("fa");
            i.classList.add("fa-trash");
            i.addEventListener("click" , ()=>{
                this.deletePlan(p);
            });
            newPlan.appendChild(i);
            this.ul.appendChild(newPlan);
        });
    }

    addPlan = (name,content)=>{
        const p = new plan(name,content);
        this.plans.push(p);
        this.showPlans();
    }
    deletePlan = (p)=>
    {
        console.log("Delete ",p);
        this.plans = this.plans.filter((actualPlan) => actualPlan != p);
        this.showPlans();
    }
}

const Plans = new plans();
const disabledButton = (button,...dependencies)=>
{
    button.disabled = false;
    dependencies.forEach((dep) =>
    {
        if(!dep.value.trim().length)
        {
            button.disabled = true;
            return;
        }
    });
};

const nameInput = document.querySelector("#name");
const contentInput = document.querySelector("#location");
//const dateInput = document.querySelector("#datetime");
const addButton = document.querySelector("#add");
addButton.disabled = true;
nameInput.addEventListener("keyup",()=>
{
    disabledButton(addButton,nameInput,contentInput);
});
contentInput.addEventListener("keyup",()=>
{
    disabledButton(addButton,nameInput,contentInput);
});
addButton.addEventListener("click",()=>
{
    Plans.addPlan(nameInput.value,contentInput.value);
});



