import React, {useEffect} from 'react';

export default function ItemSkill({ item, selectSkills, setSelectSkills, olds }){

  const handleClick = e => {

    const skill = e.target.textContent;

    if(e.target.classList.contains('active-skill-item')){
      e.target.classList.remove('active-skill-item');

      setSelectSkills(prev => new Set([...prev].filter(x => x !== skill)));
    }else{
      e.target.classList.add('active-skill-item');

      setSelectSkills(new Set([...selectSkills, skill]));
    }
  };

  const oldsValidate = (skill) => {
    if(olds.find(x => x === skill)){
      return 'active-skill-item'
    }else{
      return ''
    }
  };
  
  useEffect(() => {
    // Agregar los skills al input hidden
    document.querySelector('#skills').value = [...selectSkills];
  }, [selectSkills]);

  return (
    <li 
      className={`py-1 px-3 rounded-full bg-gray-300 cursor-pointer border border-gray-300 ${oldsValidate(item.name)}`}
      onClick={ e => handleClick(e) }
      value={ item.name }
    >
      { item.name }
    </li>
  );
};