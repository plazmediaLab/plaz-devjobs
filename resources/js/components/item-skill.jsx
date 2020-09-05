import React, {useEffect} from 'react';

export default function ItemSkill({ item, selectSkills, setSelectSkills }){

  const handleClick = e => {

    const skill = e.target.textContent;

    if(e.target.classList.contains('bg-purple_grad-500')){
      e.target.classList.remove('bg-purple_grad-500');
      e.target.classList.remove('border-purple_grad-600');
      e.target.classList.remove('text-white');

      setSelectSkills(prev => new Set([...prev].filter(x => x !== skill)));
    }else{
      e.target.classList.add('bg-purple_grad-500');
      e.target.classList.add('border-purple_grad-600');
      e.target.classList.add('text-white');

      setSelectSkills(new Set([...selectSkills, skill]));
    }
  };
  
  useEffect(() => {
    // Agregar los skills al input hidden
    document.querySelector('#skills').value = [...selectSkills];
  }, [selectSkills]);

  return (
    <li 
      className="py-1 px-3 rounded-full bg-gray-300 cursor-pointer border border-gray-300"
      onClick={ e => handleClick(e) }
      value={ item.name }
    >
      { item.name }
    </li>
  );
};