using UnityEngine;

namespace Fitting_Room
{
    public enum Category
    {
        Dress,
        Shirt,
        Pants
    }
    
    [CreateAssetMenu(menuName = "Fitting Room/Clothing", fileName = "Cloth")]
    public class Clothing : ScriptableObject
    {
        [SerializeField] private string clothName;
        [SerializeField] private Category category;
        
    }
}